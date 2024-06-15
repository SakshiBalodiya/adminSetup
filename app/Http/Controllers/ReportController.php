<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function admin_index()
    {
        return view('admin.report.index');
    }
}
