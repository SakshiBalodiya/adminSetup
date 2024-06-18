<?php

namespace App\Http\Controllers;
use App\Models\Staff;

use App\Models\Staff;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;

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
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
        ]);
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
        $staff->descriptor = 'xyz';
        $file = $request->file('image');
        $staff->image = "data:image/png;base64," . base64_encode(file_get_contents($file));
        $staff->save();

        return redirect('staff');

    }
    public function admin_edit($id)
    {
        $staff = Staff::leftJoin('users as U', 'U.id', 'staff.userId')
            ->select(
                'staff.id',
                'staff.image',
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



        $staff->descriptor = 'xyz';

        if (!empty($request->image)) {
            $file = $request->file('image');
            $staff->image = "data:image/png;base64," . base64_encode(file_get_contents($file));
            if (!empty($file)) {
                $staff->image = $file;
            } else {
                $staff->image = '';
            }
        }

        $staff->save();

        return redirect('staff');
    }


}
