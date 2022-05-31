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
        // return  Hash::make($request->pinCode);
        $usersModel = UsersModel::where('userName', $request->userName)->first();
        dd(Hash::check($request->pinCode, $usersModel->pinCode));
        // dd($usersModel->pinCode);
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
}
