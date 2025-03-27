<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//public  route
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register',  [AuthController::class, 'register']);

//protected route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('/tasks', TasksController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});