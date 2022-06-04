<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceBookController;
use App\Http\Controllers\ManageUsersController;

Route::get('/', function () { return redirect('/attendanceBook'); })->middleware('Authen');

// Route::get('/attendanceBook', function () { return view('attendanceBookView'); })->middleware('Authen');
Route::get('/attendanceBook', [AttendanceBookController::class, 'attendanceBookView'])->middleware('Authen');
// Route::get('/manageUsers', function () { return view('manageUsersView'); })->middleware(['Authen', 'ifAdmin']);
Route::get('/manageUsers', [ManageUsersController::class, 'manageUsersView'])->middleware(['Authen', 'ifAdmin']);
Route::get('/manageDevices', function () { return view('manageDevicesView'); })->middleware(['Authen', 'ifAdmin']);


Route::get('/login', [AuthController::class, 'loginView'])->middleware('Authen');
Route::post('/login', [AuthController::class, 'loginAuth'])->middleware('Authen');

Route::get('/settings', [AuthController::class, 'passwordResetView'])->middleware('Authen');
Route::post('/passwordResetAuth', [AuthController::class, 'passwordResetAuth'])->middleware(['Authen', 'ifAdmin']);

Route::get('/logout', [AuthController::class, 'logout'])->middleware('Authen');