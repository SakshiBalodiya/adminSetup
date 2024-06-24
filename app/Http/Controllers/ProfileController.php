<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function index()
    {
        $users = Auth::user();

        return view('admin.profile', compact('users'));
    }
    public function update(Request $request)
    {
        $users = User::find($request->id);
        if (!empty($request->name))
            $users->name = $request->name;
        if (!empty($request->email))
            $users->email = $request->email;
        if (!empty($request->username))
            $users->username = $request->username;
        $users->save();
        return redirect('profile');
    }
}
