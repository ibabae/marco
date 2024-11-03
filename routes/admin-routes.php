<?php

use App\Http\Controllers\Admin\Shop\ProductController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use App\Http\Controllers\Admin\UserManagement\PermissionController;
use App\Http\Controllers\Admin\UserManagement\RoleController;
use Illuminate\Support\Facades\Route;


Route::prefix('user-management')->group(function(){
    Route::apiResource('user',UserController::class);
    Route::apiResource('role',RoleController::class);
    Route::apiResource('permission',PermissionController::class);
});
Route::prefix('shop')->group(function(){
    Route::apiResource('product',ProductController::class);
    Route::apiResource('category',ProductController::class);
});
