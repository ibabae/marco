<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('throttle:10,1')->apiResource('login',AuthController::class);
Route::middleware(['auth:api'])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::apiResource('user',UserController::class);
    });
});
