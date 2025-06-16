<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::get('{id}', [ProductController::class, 'show']);
    Route::put('{id}', [ProductController::class, 'update']);
    Route::delete('{id}', [ProductController::class, 'destroy']);

    // Reviews
    Route::get('{id}/reviews', [ReviewController::class, 'index']);
    Route::middleware('auth:sanctum')->post('{id}/reviews', [ReviewController::class, 'store']);
});