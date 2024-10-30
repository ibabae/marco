<?php

use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->prefix('account')->name('account')->group(function(){
    Route::get('','index')->name('.index');
    Route::delete('','destroy')->name('.logout');
});

Route::controller(OrderController::class)->prefix('order')->name('order')->group(function(){
    Route::get('','index')->name('.index');
    Route::get('{id}','create')->name('.create');
    Route::post('','store')->name('.store');
    Route::get('{id}/show','show')->name('.show');
    Route::get('{id}/edit','edit')->name('.edit'); // track
    Route::post('{id}','update')->name('.update');
    Route::delete('{id}','destroy')->name('.destroy');
});

Route::controller(AddressController::class)->prefix('address')->name('address')->group(function(){
    Route::get('','index')->name('.index');
    Route::get('{id}','create')->name('.create');
    Route::post('','store')->name('.store');
    Route::get('{id}/show','show')->name('.show');
    Route::get('{id}/edit','edit')->name('.edit');
    Route::post('{id}','update')->name('.update');
    Route::delete('{id}','destroy')->name('.destroy');
});

Route::controller(ProfileController::class)->prefix('profile')->name('profile')->group(function(){
    Route::get('','index')->name('.index');
    Route::get('{id}','create')->name('.create');
    Route::post('','store')->name('.store');
    Route::get('{id}/show','show')->name('.show');
    Route::get('{id}/edit','edit')->name('.edit');
    Route::post('{id}','update')->name('.update');
    Route::delete('{id}','destroy')->name('.destroy');
});
