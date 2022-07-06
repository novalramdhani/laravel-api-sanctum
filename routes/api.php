<?php

use App\Http\Controllers\{
    LoginController,
    LogOutAllController,
    LogOutController,
    PostController,
    RegisterController
};

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/login', LoginController::class);
    Route::post('/register', RegisterController::class);


    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', LogOutController::class);

        Route::post('/logout-all', LogOutAllController::class);

        Route::apiResource('posts', PostController::class)
                    ->only(['index', 'show']);
    });
});
