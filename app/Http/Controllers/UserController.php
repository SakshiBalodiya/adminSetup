<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function admin_index()
    {
        return view('admin.user.index');

    }
    public function admin_create()
    {
        return view('admin.user.create');

    }
}
