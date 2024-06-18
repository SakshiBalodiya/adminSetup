<?php

namespace App\Http\Controllers;
use App\Models\Staff;

use App\Models\Staff;
use App\Models\User;
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
        $users = new User;
        $users->name = $request->name;
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
        $staff->image = base64_encode(file_get_contents($file));
    
        
        $staff->save();
        return redirect('staff');

    }
    public function admin_edit()
    {
        return view('admin.staff.edit');

    }
}
