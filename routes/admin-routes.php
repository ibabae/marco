<?php

use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\Shop\AttributeController;
use App\Http\Controllers\Admin\Shop\CategoryController;
use App\Http\Controllers\Admin\Shop\ProductController;
use App\Http\Controllers\Admin\UserManagement\RolePermissionController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use App\Http\Controllers\Admin\UserManagement\PermissionController;
use App\Http\Controllers\Admin\UserManagement\RoleController;
use App\Http\Controllers\Admin\UserManagement\UserRoleController;
use Illuminate\Support\Facades\Route;

Route::get('/routes', RouteController::class)->name('routes');

Route::prefix('user-management')->group(function(){
    Route::apiResource('user',UserController::class);
    Route::apiResource('role',RoleController::class);
    Route::apiResource('permission',PermissionController::class);
    Route::apiResource('role-permission',RolePermissionController::class);
    Route::apiResource('user-role',UserRoleController::class);
});
Route::prefix('shop')->group(function(){
    Route::apiResource('product',ProductController::class);
    Route::apiResource('category',CategoryController::class);
    Route::apiResource('attribute',AttributeController::class);
});
