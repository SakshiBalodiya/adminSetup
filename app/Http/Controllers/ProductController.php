<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function admin_index()
    {
        return view('admin.products.index');

    }
}
