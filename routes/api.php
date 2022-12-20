<?php

use App\Http\Controllers\api\DomainController;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegisterController;

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('domain', DomainController::class);

    Route::get('user', [RegisterController::class, 'index']);
    Route::delete('user/{id}', [RegisterController::class, 'desploy']);
    
    Route::prefix('auth')->group(function () {
        Route::post('register', [RegisterController::class, 'register']);
        Route::post('logout', [LoginController::class, 'logout']);
    });
});

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
});
