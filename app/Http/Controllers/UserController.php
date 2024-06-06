<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view("register");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password'=> 'required|min:6|confirmed',
        ]);


        $user = User::create($data);

        if($user) {
            return redirect()->route('user.loginPage');
        }

    }

    public function login()
    {
        return view("login");
    }

    public function loginCheck(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password'=> 'required',
        ]);


        if(Auth::attempt($credentials)) {
            return redirect()->route('posts.index');
        }
        else {
            return redirect()->back()->with('failed', 'Invalid Credentials!');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('posts.index');

    }

}
