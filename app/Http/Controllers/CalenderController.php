<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function admin_index()
    {
        return view('admin.calender');
    }
}
