<?php

use App\Http\Controllers\api\AuthApiController;
use App\Http\Controllers\api\PostApiController;
use Illuminate\Support\Facades\Route;

// API resource route for posts
Route::apiResource('posts', PostApiController::class);

// Login endpoint
Route::post('login', [AuthApiController::class, 'login'])->name('api.login')->middleware('auth:api');

Route::middleware('auth:api')->group(function () {
    Route::get('me', [AuthApiController::class, 'me']);
    Route::post('refresh', [AuthApiController::class, 'refresh']);
    Route::post('logout', [AuthApiController::class, 'logout']);
});
