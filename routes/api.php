<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post(uri: '/login', action: [AuthController::class, 'login']);
Route::post(uri: '/register', action: [AuthController::class, 'register']);
Route::post(uri: '/logout', action: [AuthController::class, 'logout']);
Route::resource('/tasks', TasksController::class);