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
        $request->validate(
            [
                '_token' => 'required',
                'userName' => 'required',
                'password' => 'required'
            ]
        );

        $user = UsersModel::where('userName', $request->userName)->first();
        
        if($user && Hash::check($request->password, $user->password))
        {
            $request->session()->put('user', $user);
            return redirect('/');
        }
        else
        {
            return redirect()->back();
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
                '_token' => 'required',
                'current_password' => 'required',
                'password' => 'required|confirmed|min:4|max:20'
            ]
        );

        if(Hash::check($request->current_password, $request->session()->get('user')->password))
        {
            UsersModel::whereId($request->session()->get('user')->id)->update(['password' => Hash::make($request->password)]);
            return redirect('/');
        }
        else
        {
            return redirect()->back()->withErrors("Old Password does not match.");
        }
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
