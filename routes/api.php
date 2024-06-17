<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//API
//POSTS
Route::get('blog/posts', [\App\Http\Controllers\Api\Blog\PostController::class, 'index']);
Route::get('blog/posts/{id}', [\App\Http\Controllers\Api\Blog\PostController::class, 'show']);

//CATEGORIES
Route::get('blog/categories', [\App\Http\Controllers\Api\Blog\CategoryController::class, 'index']);
Route::get('blog/categories/{id}', [\App\Http\Controllers\Api\Blog\CategoryController::class, 'show']);
Route::get('blog/categories/create', [\App\Http\Controllers\Api\Blog\CategoryController::class, 'create']);
Route::put('blog/categories/{id}', [\App\Http\Controllers\Api\Blog\CategoryController::class, 'edit']);

