<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/', function () { return view('welcome'); });
Route::get('/attendanceBook', function () { return view('attendanceBookView'); });
Route::get('/manageUsers', function () { return view('manageUsersView'); });
Route::get('/manageDevices', function () { return view('manageDevicesView'); });


Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/loginAuth', [AuthController::class, 'loginAuth']);

Route::get('/passwordReset', [AuthController::class, 'passwordResetView']);
Route::post('/passwordResetAuth', [AuthController::class, 'passwordResetAuth']);