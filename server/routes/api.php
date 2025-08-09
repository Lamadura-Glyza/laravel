<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get-all-posts', [PostsController::class, 'getAllPosts']);
Route::get('/post/{id}', [PostsController::class, 'show']);
Route::post('/create-post', [PostsController::class, 'store']);