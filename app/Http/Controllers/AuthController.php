<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UsersModel;

class AuthController extends Controller
{
    function loginView()
    {
        return view('auth.loginView');
    }

    function loginAuth(Request $request)
    {
        $user = UsersModel::where('userName', $request->userName)->first();
        
        if($user && Hash::check($request->pinCode, $user->pinCode))
        {
            $request->session()->put('user', $user);
            return redirect('/');
        }
        else
        {
            return "Invalid";
        }
    }

    function passwordResetView()
    {
        return view('auth.passwordResetView');
    }

    function passwordResetAuth(Request $request)
    {
        $request->validate(
            [
                'token' => 'required',
                'currentPinCode' => 'required',
                'newPinCode' => 'required|confirmed',
            ]
        );
        dd($request);
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
