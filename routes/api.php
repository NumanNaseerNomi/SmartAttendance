<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\DevicesController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/getUsers', [UsersController::class, 'index']);
Route::post('/getUser', [UsersController::class, 'show']);
Route::put('/addUser', [UsersController::class, 'store']);
Route::patch('/updateUser', [UsersController::class, 'update']);
Route::delete('/deleteUser', [UsersController::class, 'destroy']);

Route::get('/getDevices', [DevicesController::class, 'index']);
Route::post('/getDevice', [DevicesController::class, 'show']);
Route::put('/addDevice', [DevicesController::class, 'store']);
Route::patch('/updateDevice', [DevicesController::class, 'update']);
Route::delete('/deleteDevice', [DevicesController::class, 'destroy']);
