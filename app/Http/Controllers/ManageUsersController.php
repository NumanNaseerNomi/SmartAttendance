<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UsersModel;

class ManageUsersController extends Controller
{
    function show()
    {
        $result = UsersModel::all();
        return view('manageView')->with(['result' => $result, 'type' => 'User', 'idType' => 'Card']);
    }

    function save(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'name' => 'required',
                'cardId' => 'required',
                'description' => 'required',
                'isBlocked' => 'required'
            ]
        );

        if($request->id)
        {
            $result = UsersModel::find($request->id);
            $result->update($request->all());
        }
        else
        {
            $userName = str_replace(' ', '.', strtolower($request->name)) . "." . rand(1,999);
            $request->merge(['userName' => $userName, 'password' => Hash::make('admin'), 'isAdmin' => 0]);
            UsersModel::create($request->all());
        }
        
        return redirect()->back();
    }
}
