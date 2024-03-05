<?php
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\ColorController;
use App\Http\Controllers\Admin\Product\SizeController;
use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Support\Facades\Route;

    // Product
    Route::resource('admin/products', ProductController::class)->names([
        'index' => 'admin.products',
        'create' => 'admin.product.create',
        'store' => 'admin.product.store',
        'show' => 'admin.product.show',
        'edit' => 'admin.product.edit',
        'update' => 'admin.product.update',
        'destroy' => 'admin.product.destroy',
    ]);
    Route::resource('admin/product/sizes', SizeController::class)->names([
        'index' => 'admin.sizes',
        'create' => 'admin.size.create',
        'store' => 'admin.size.add',
        'show' => 'admin.size.view',
        'edit' => 'admin.size.edit',
        'update' => 'admin.size.update',
        'destroy' => 'admin.size.destroy',
    ]);
    Route::resource('admin/product/colors', ColorController::class)->names([
        'index' => 'admin.colors',
        'create' => 'admin.color.create',
        'store' => 'admin.color.add',
        'show' => 'admin.color.view',
        'edit' => 'admin.color.edit',
        'update' => 'admin.color.update',
        'destroy' => 'admin.color.destroy',
    ]);
    Route::resource('admin/product/categories', CategoryController::class)->names([
        'index' => 'admin.categories',
        'create' => 'admin.category.create',
        'store' => 'admin.category.add',
        'show' => 'admin.category.view',
        'edit' => 'admin.category.edit',
        'update' => 'admin.category.update',
        'destroy' => 'admin.category.destroy',
    ]);
