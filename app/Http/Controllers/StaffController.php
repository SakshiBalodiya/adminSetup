<?php

namespace App\Http\Controllers;


use App\Models\Staff;
use App\Models\User;
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
      

    
    $binaryData = base64_decode($image);



    $floatArray = [];
    $dataLength = strlen($binaryData);

    
    $floatSize = 4;

    for ($i = 0; $i < $dataLength; $i += $floatSize) {
       
        $bytes = substr($binaryData, $i, $floatSize);

        $floatArray[] = unpack('f', $bytes)[1];
    }

    print_r($floatArray);
    die;

// Print the resulting float32 array

      
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
        $staff->descriptor = $floatArray;
        $staff->image=$image;
        
        $staff->save();
        return redirect('staff');

    }
    public function admin_edit()
    {
        return view('admin.staff.edit');

    }
}
