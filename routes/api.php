<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogPostController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;

Route::prefix('blog-posts')->group(function () {
    Route::get('/', [BlogPostController::class, 'index']);
    Route::post('/', [BlogPostController::class, 'store']);
    Route::get('/{id}', [BlogPostController::class, 'show']);
    Route::put('/{blogPost}', [BlogPostController::class, 'update']);
    Route::delete('/{blogPost}', [BlogPostController::class, 'destroy']);
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::put('/{category}', [CategoryController::class, 'update']);
    Route::delete('/{category}', [CategoryController::class, 'destroy']);
});

Route::prefix('comments')->group(function () {
    Route::get('/post/{blogPostId}', [CommentController::class, 'index']);
    Route::post('/', [CommentController::class, 'store']);
    Route::delete('/{comment}', [CommentController::class, 'destroy']);
});
