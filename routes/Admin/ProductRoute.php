<?php
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\ColorController;
use App\Http\Controllers\Admin\Product\SizeController;
use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Support\Facades\Route;

    // Product
    Route::resource('products', ProductController::class)->names([
        'index' => 'products',
        'create' => 'product.create',
        'store' => 'product.store',
        'show' => 'product.show',
        'edit' => 'product.edit',
        'update' => 'product.update',
        'destroy' => 'product.destroy',
    ]);
    Route::resource('product/sizes', SizeController::class)->names([
        'index' => 'sizes',
        'create' => 'size.create',
        'store' => 'size.add',
        'show' => 'size.view',
        'edit' => 'size.edit',
        'update' => 'size.update',
        'destroy' => 'size.destroy',
    ]);
    Route::resource('product/colors', ColorController::class)->names([
        'index' => 'colors',
        'create' => 'color.create',
        'store' => 'color.add',
        'show' => 'color.view',
        'edit' => 'color.edit',
        'update' => 'color.update',
        'destroy' => 'color.destroy',
    ]);
    Route::resource('product/categories', CategoryController::class)->names([
        'index' => 'categories',
        'create' => 'category.create',
        'store' => 'category.add',
        'show' => 'category.view',
        'edit' => 'category.edit',
        'update' => 'category.update',
        'destroy' => 'category.destroy',
    ]);
