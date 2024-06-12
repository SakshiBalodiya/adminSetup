<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function admin_index()
    {
        return view('admin.staff.index');
    }
    public function admin_create()
    {
        return view('admin.staff.create');

    }
    public function admin_edit()
    {
        return view('admin.staff.edit');

    }
}
