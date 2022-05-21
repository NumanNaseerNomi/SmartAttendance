<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;

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
Route::post('/addUser', [UsersController::class, 'store']);
Route::post('/updateUser', [UsersController::class, 'update']);
Route::post('/deleteUser', [UsersController::class, 'destroy']);