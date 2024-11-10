<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QueueController;
use Illuminate\Support\Facades\Route;


Route::middleware('throttle:10,1')->apiResource('login',AuthController::class);
Route::apiResource('/queue',QueueController::class);
