<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/login', LoginController::class);
    Route::post('/register', RegisterController::class);


    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', LogOutController::class);

        Route::apiResource('posts', PostController::class)
                    ->only(['index', 'show']);
    });
});
