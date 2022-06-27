<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\UsersController;
// use App\Http\Controllers\DevicesController;
use App\Http\Controllers\AttendanceController;
// use App\Http\Controllers\MarkAttendanceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/getUsers', [UsersController::class, 'index']);
// Route::post('/getUser', [UsersController::class, 'show']);
// Route::put('/addUser', [UsersController::class, 'store']);
// Route::patch('/updateUser', [UsersController::class, 'update']);
// Route::delete('/deleteUser', [UsersController::class, 'destroy']);

// Route::get('/getDevices', [DevicesController::class, 'index']);
// Route::post('/getDevice', [DevicesController::class, 'show']);
// Route::put('/addDevice', [DevicesController::class, 'store']);
// Route::patch('/updateDevice', [DevicesController::class, 'update']);
// Route::delete('/deleteDevice', [DevicesController::class, 'destroy']);

// Route::get('/getAttendances', [AttendanceController::class, 'getAttendances']);
// Route::post('/getAttendance', [AttendanceController::class, 'getAttendance']);
Route::put('/markAttendance', [AttendanceController::class, 'markAttendance']);
// Route::delete('/deleteAttendance', [AttendanceController::class, 'delete']);
