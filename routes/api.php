<?php

use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('register', [\App\Http\Controllers\Api\UserController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Api\UserController::class, 'login']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // CRUD operations for books
    Route::get('books', [\App\Http\Controllers\Api\BooksController::class, 'index']);
    Route::post('books', [\App\Http\Controllers\Api\BooksController::class, 'store']);
    Route::get('books/{book}', [\App\Http\Controllers\Api\BooksController::class, 'show']);
    Route::put('books/{book}', [\App\Http\Controllers\Api\BooksController::class, 'update']);
    Route::patch('books/{book}', [\App\Http\Controllers\Api\BooksController::class, 'update']);
    Route::delete('books/{book}', [\App\Http\Controllers\Api\BooksController::class, 'destroy']);

    // Logout route
    Route::post('logout', [\App\Http\Controllers\Api\UserController::class, 'logout']);
});
