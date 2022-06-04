<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;

class ManageUsersController extends Controller
{
    function manageUsersView()
    {
        $usersDetail = UsersModel::all(); // dd($usersDetail);
        return view('manageUsersView')->with(['usersDetail' => $usersDetail]);
    }
}
