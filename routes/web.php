<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// use App\Http\Middleware\AuthMiddleware;

// Route::get('/', function () { return view('welcome'); });
Route::get('/', function () { return redirect('/attendanceBook'); })->middleware('AuthMiddleware');

Route::get('/attendanceBook', function () { return view('attendanceBookView'); })->middleware('AuthMiddleware');
Route::get('/manageUsers', function () { return view('manageUsersView'); })->middleware('AuthMiddleware');
Route::get('/manageDevices', function () { return view('manageDevicesView'); })->middleware('AuthMiddleware');


Route::get('/login', [AuthController::class, 'loginView'])->middleware('AuthMiddleware');
Route::post('/login', [AuthController::class, 'loginAuth'])->middleware('AuthMiddleware');

Route::get('/passwordReset', [AuthController::class, 'passwordResetView'])->middleware('AuthMiddleware');
Route::post('/passwordResetAuth', [AuthController::class, 'passwordResetAuth'])->middleware('AuthMiddleware');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('AuthMiddleware');