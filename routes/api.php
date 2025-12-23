<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Middleware\RoleMiddleware; // <- import middleware

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', fn (Request $request) => $request->user());
    Route::post('/logout', [AuthController::class, 'logout']);

    // User & Admin
    Route::get('/products', [ProductController::class, 'index']);

    // Admin only
    Route::post('/products', [ProductController::class, 'store'])
        ->middleware(RoleMiddleware::class . ':admin');

    Route::patch('/products/{product}', [ProductController::class, 'update'])
        ->middleware(RoleMiddleware::class . ':admin');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->middleware(RoleMiddleware::class . ':admin');
});
