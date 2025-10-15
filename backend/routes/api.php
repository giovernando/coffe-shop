<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\BlogPostController;
use App\Http\Controllers\Api\GalleryImageController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Menu
    Route::apiResource('menu', MenuController::class);

    // Orders
    Route::apiResource('orders', OrderController::class);

    // Reservations
    Route::apiResource('reservations', ReservationController::class);

    // Feedback
    Route::apiResource('feedback', FeedbackController::class);
});

// Public routes for blog and gallery
Route::apiResource('blog-posts', BlogPostController::class)->only(['index', 'show']);
Route::apiResource('gallery-images', GalleryImageController::class)->only(['index', 'show']);
