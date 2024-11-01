<?php
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\ColorController;
use App\Http\Controllers\Admin\Product\SizeController;
use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::name('shop.')->prefix('shop')->group(function(){
    // Product
    Route::resource('product', ProductController::class)->names([
        'index' => 'product',
        'create' => 'product.create',
        'store' => 'product.store',
        'show' => 'product.show',
        'edit' => 'product.edit',
        'update' => 'product.update',
        'destroy' => 'product.destroy',
    ]);
    Route::resource('size', SizeController::class)->names([
        'index' => 'size',
        'create' => 'size.create',
        'store' => 'size.add',
        'show' => 'size.view',
        'edit' => 'size.edit',
        'update' => 'size.update',
        'destroy' => 'size.destroy',
    ]);
    Route::resource('color', ColorController::class)->names([
        'index' => 'color',
        'create' => 'color.create',
        'store' => 'color.add',
        'show' => 'color.view',
        'edit' => 'color.edit',
        'update' => 'color.update',
        'destroy' => 'color.destroy',
    ]);
    Route::resource('category', CategoryController::class)->names([
        'index' => 'category',
        'create' => 'category.create',
        'store' => 'category.add',
        'show' => 'category.view',
        'edit' => 'category.edit',
        'update' => 'category.update',
        'destroy' => 'category.destroy',
    ]);
});
