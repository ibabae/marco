<?php

use App\Http\Controllers\Admin\Shop\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::apiResource('user',UserController::class);
Route::prefix('shop')->group(function(){
    Route::apiResource('product',ProductController::class);
    Route::apiResource('category',ProductController::class);
});
