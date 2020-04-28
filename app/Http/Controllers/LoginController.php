<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            
            checkEmployeeIngress()

            return redirect()->intended('/inicio');
        }
        return view('auth.login');
    }
    function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
