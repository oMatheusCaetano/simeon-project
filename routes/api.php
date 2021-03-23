<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CommentController;

Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/refresh', [AuthController::class, 'refresh']);
Route::get('/auth/logout', [AuthController::class, 'logout']);


Route::post('/users', [UserController::class, 'store']);

Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);

Route::post('/comments', [CommentController::class, 'store']);
