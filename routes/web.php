<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceBookController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\ManageDevicesController;

Route::get('/', function () { return redirect('/attendanceBook'); })->middleware('Authen');
Route::get('/attendanceBook', [AttendanceBookController::class, 'attendanceBookView'])->middleware('Authen');

Route::get('/manageUsers', [ManageUsersController::class, 'show'])->middleware(['Authen', 'ifAdmin']);
Route::post('/saveUser', [ManageUsersController::class, 'save'])->middleware(['Authen', 'ifAdmin']);

Route::get('/manageDevices', [ManageDevicesController::class, 'show'])->middleware(['Authen', 'ifAdmin']);
Route::post('/saveDevice', [ManageDevicesController::class, 'save'])->middleware(['Authen', 'ifAdmin']);

Route::get('/manageDevicesO', function () { return view('manageDevicesViewO'); })->middleware(['Authen', 'ifAdmin']);


Route::get('/login', [AuthController::class, 'loginView'])->middleware('Authen');
Route::post('/login', [AuthController::class, 'loginAuth'])->middleware('Authen');

Route::get('/settings', [AuthController::class, 'passwordResetView'])->middleware('Authen');
Route::post('/passwordResetAuth', [AuthController::class, 'passwordResetAuth'])->middleware(['Authen']);

Route::get('/logout', [AuthController::class, 'logout'])->middleware('Authen');