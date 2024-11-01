<?php
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;

Route::name('layer.')->prefix('layer')->group(function(){
    // Product
    Route::resource('user', UserController::class)->names([
        'index' => 'user',
        'create' => 'user.create',
        'store' => 'user.store',
        'show' => 'user.show',
        'edit' => 'user.edit',
        'update' => 'user.update',
        'destroy' => 'user.destroy',
    ]);

});
