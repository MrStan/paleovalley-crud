<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('products', '\App\Http\Controllers\ProductController')->except('show');
});
Route::apiResource('products', '\App\Http\Controllers\ProductController')->only('show');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products/{product}', 'ProductController@show');
    // ... other protected routes
});