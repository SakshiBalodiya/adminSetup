<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Staff;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function admin_index(Request $request)
    {
        $staff = Staff::leftJoin('users as U', 'U.id', 'staff.userId')
            ->select('staff.id', 'staff.image', 'staff.created_at', 'U.name as name', 'U.mobileNo as mobileNo', 'U.id as userId', 'U.email', 'U.username')->get();

        return view('admin.staff.index', compact('staff'));
    }
    public function admin_create()
    {
        return view('admin.staff.create');
    }

    public function admin_store(Request $request)
    {


       
    
        $file = $request->file('filename');
        $image = base64_encode(file_get_contents($file));
        $descriptor=$request->descriptor;
     

       
        

        $users = new User;
        $users->name = $request->firstname . ' ' . $request->lastname;
        $users->email = $request->email;
        $users->username = $request->username;
        $users->mobileNo = $request->mobileNo;
        $users->role = 'staff';
        $users->password = Hash::make($request->password);
        $users->save();

        $staff = new Staff;
        $staff->userId = $users->id;

        $staff->descriptor = $descriptor;
        $staff->image=$image;
        

     
        $staff->save();

        return redirect('staff');

    }
    public function admin_edit($id)
    {
        $staff = Staff::leftJoin('users as U', 'U.id', 'staff.userId')
            ->select(
                'staff.id',
                'staff.image',
                'staff.descriptor',
                'staff.created_at',
                DB::raw("SUBSTRING_INDEX(U.name, ' ', 1) as firstname"),
                DB::raw("SUBSTRING_INDEX(U.name, ' ', -1) as lastname"),
                'U.mobileNo as mobileNo',
                'U.id as userId',
                'U.email',
                'U.username'
            )
            ->where('staff.id', $id)->first();


        return view('admin.staff.edit', compact('staff'));
    }
    public function admin_update(Request $request)
    {
        $staff = Staff::find($request->id);
        $users = User::find($staff->userId);

        $users->name = $request->firstname . ' ' . $request->lastname;
        $users->email = $request->email;
        $users->username = $request->username;
        $users->mobileNo = $request->mobileNo;
        $users->password = Hash::make($request->password);
        $users->save();



        $staff->descriptor = $request->descriptor;

        if (!empty($request->image)) {
  
            $staff->image = "data:image/png;base64," . base64_encode(file_get_contents($request->file('image')));
       
        }

        $staff->save();

        return redirect('staff');
    }
    public function admin_destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect('staff');
    }

}
