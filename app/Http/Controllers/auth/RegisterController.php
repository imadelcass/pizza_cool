<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register.index');
    }
    public function store(Request $request)
    {
        //validate the user register request
        $this->validate($request,[
            'username' => 'required|unique:users,username|min:4|max:255',
            'email' => 'required|email|unique:users,email|min:4|max:255',
            'password' => 'required|min:4|max:20',
        ]);
        //add the user to the users table
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
   
        //redirect the user to login page
        return redirect()->route('login');
    }
}
