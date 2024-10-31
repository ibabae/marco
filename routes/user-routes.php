<?php

use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->prefix('account')->name('account')->group(function(){
    Route::get('','index')->name('.index');
    Route::delete('','destroy')->name('.logout');
});

Route::controller(OrderController::class)->prefix('order')->name('order')->group(function(){
    Route::get('','index')->name('.index');
    Route::get('/create','create')->name('.create');
    Route::post('','store')->name('.store');
    Route::get('{id}/show','show')->name('.show');
    Route::get('{id}/edit','edit')->name('.edit'); // track
    Route::post('{id}','update')->name('.update');
    Route::get('{id}/delete','destroy')->name('.delete');
});

Route::controller(AddressController::class)->prefix('address')->name('address')->group(function(){
    Route::get('','index')->name('.index');
    Route::get('/create','create')->name('.create');
    Route::post('','store')->name('.store');
    Route::get('{id}/show','show')->name('.show');
    Route::get('{id}/edit','edit')->name('.edit');
    Route::post('{id}','update')->name('.update');
    Route::get('{id}/delete','destroy')->name('.delete');
});

Route::controller(ProfileController::class)->prefix('profile')->name('profile')->group(function(){
    Route::get('','index')->name('.index');
    Route::get('/create','create')->name('.create');
    Route::post('','store')->name('.store');
    Route::get('{id}/show','show')->name('.show');
    Route::get('{id}/edit','edit')->name('.edit');
    Route::post('{id}','update')->name('.update');
    Route::get('{id}/delete','destroy')->name('.delete');
});
