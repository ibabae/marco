<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('throttle:10,1')->apiResource('login',AuthController::class);
