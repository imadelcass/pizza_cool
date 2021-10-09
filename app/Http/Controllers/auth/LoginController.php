<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.index');
    }
    public function store(Request $request)
    {
        //validate the user login request
        $this->validate($request,[
            'username' => 'required|exists:users,username|max:255',
            'password' => 'required',
        ]);

        //login the user
        if (Auth::attempt($request->only('username', 'password'))){

            //redirect the user to the home page
            return redirect()->route('pizzas');
        }else{
            
            return back()
            ->withErrors(['username' => "this credentials is not correct"])
            ->withInput();
            
        };

    }
    public function destroy(){
        Auth::logout();
        return redirect()->route('login');
    }
}
