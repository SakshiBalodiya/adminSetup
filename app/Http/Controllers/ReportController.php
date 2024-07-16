<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Staff;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function admin_index(Request $request)
    {

        $search = trim($request->input('search'));

        $staff=DB::table('attendances as AT')
                     ->leftJoin('users as U','AT.userId','U.id')
                     ->select('U.id','U.name','U.email','U.role','U.mobileNo')
                     ->where('U.role','staff');
      
      if (!empty($search))
            $staff = $staff->where('U.name', 'like', "%$search%");

        $staff = $staff->orderBy('U.id', 'desc')->paginate(10);

        return view('admin.report.index',compact('staff','search'));
    }
}
