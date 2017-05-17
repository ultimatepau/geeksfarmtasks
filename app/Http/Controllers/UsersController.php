<?php

namespace App\Http\Controllers;
use Sentinel;

use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;

class UsersController extends Controller
{
    public function signup() 
    {
    	return view('signup');
    }

    public function store(UserRequest $request) 
    {
    	Sentinel::registerAndActivate($request->all());
    	// Sentinel::register($request->all(),true);
    	return redirect()->back()->with('success','Success create new user');
    }

    public function login()
    {
        if($user = Sentinel::check())
        {
            return redirect('/')->with('success','You has login '.$user->email);
        } 
        else 
        {
            return view('login');
        }
    }

    public function check(LoginRequest $request) 
    {
        if($user = Sentinel::authenticate($request->all()))
        {
            return redirect()->intended('/')->with('success','Welcome '.$user->email);
        }
        else 
        {
            return view('login')->with('error','Login fails');
        }
    }

    public function logout() {
        Sentinel::logout();
        return redirect('login')->with('success','Logout success');
    }
}
