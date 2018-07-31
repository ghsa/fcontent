<?php

namespace FContent\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{


    public function login()
    {
        return view('fcontent::auth.login');
    }

    public function auth(Request $request) 
    {


        if(Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]))
        {
           
            return redirect()->route('fcontent.home');
        }

        return redirect()->back()->withErrors(['email']);

    }


    public function logout()
    {
        
        Auth::logout();

        return redirect()->route("fcontent.login");
    }



}
