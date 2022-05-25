<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });
Route::get('/login', function () { return view('loginView'); });
Route::get('/attendanceBook', function () { return view('attendanceBookView'); });
Route::get('/manageUsers', function () { return view('manageUsersView'); });
Route::get('/manageDevices', function () { return view('manageDevicesView'); });
