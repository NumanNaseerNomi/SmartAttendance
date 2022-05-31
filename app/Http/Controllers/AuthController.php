<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function loginView()
    {
        return view('auth.loginView');
    }

    function loginAuth(Request $request)
    {
        dd($request->userName);
    }

    function passwordResetView()
    {
        return view('auth.passwordResetView');
    }

    function passwordResetAuth(Request $request)
    {
        dd($request);
    }
}
