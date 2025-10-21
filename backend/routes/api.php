<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\BlogPostController;
use App\Http\Controllers\Api\GalleryImageController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public menu routes
Route::apiResource('menu', MenuController::class)->only(['index', 'show']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Menu (full CRUD for admin)
    Route::apiResource('menu', MenuController::class)->except(['index', 'show']);

    // Orders
    Route::apiResource('orders', OrderController::class);

    // Reservations
    Route::apiResource('reservations', ReservationController::class);

    // Feedback
    Route::apiResource('feedback', FeedbackController::class);

    // Admin routes
    Route::prefix('admin')->group(function () {
        // User management
        Route::get('/users', [AdminController::class, 'getUsers']);
        Route::put('/users/{id}', [AdminController::class, 'updateUser']);
        Route::delete('/users/{id}', [AdminController::class, 'deleteUser']);

        // Menu management
        Route::get('/menu-items', [AdminController::class, 'getMenuItems']);
        Route::post('/menu-items', [AdminController::class, 'createMenuItem']);
        Route::put('/menu-items/{id}', [AdminController::class, 'updateMenuItem']);
        Route::delete('/menu-items/{id}', [AdminController::class, 'deleteMenuItem']);

        // Order management
        Route::get('/orders', [AdminController::class, 'getOrders']);
        Route::put('/orders/{id}/status', [AdminController::class, 'updateOrderStatus']);

        // Reports
        Route::get('/reports/sales', [AdminController::class, 'getSalesReport']);
    });
});

// Public routes for blog and gallery
Route::apiResource('blog-posts', BlogPostController::class)->only(['index', 'show']);
Route::apiResource('gallery-images', GalleryImageController::class)->only(['index', 'show']);
