<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAccess;
use Illuminate\Support\Facades\Route;

Route::middleware([AdminAccess::class])->group(function(){
    Route::controller(DashboardController::class)->group(function () {
        Route::get('panel', 'Panel')->name('panel');
        Route::get('support', 'Support')->name('support');
        Route::get('statistics', 'Statistics')->name('statistics');
    });

    Route::controller(AjaxController::class)->group(function(){
        Route::get('product/itemsData','ItemsData')->name('product.itemsData');
    });
    // Route::post('panel/product/list',[AdminController::class,'SearchProduct'])->name('product.search');
    // Route::get('panel/product/list',[AdminController::class,'ListProduct'])->name('product.list');
    // Route::get('panel/product/add',[AdminController::class,'AddProduct'])->name('product.add');
    // Route::post('panel/product/store',[AdminController::class,'StoreProduct'])->name('product.store');
    // Route::get('panel/product/edit/{id}',[AdminController::class,'EditProduct'])->name('product.edit');
    // Route::post('panel/product/edit/store/{id}',[AdminController::class,'StoreEdit'])->name('product.edit.store');

    // Pages
    Route::get('panel/page/list',[AdminController::class,'ListPage'])->name('page.list');
    Route::get('panel/page/add',[AdminController::class,'AddPage'])->name('page.add');
    Route::post('panel/page/store',[AdminController::class,'StorePage'])->name('page.store');
    Route::get('panel/page/edit/{id}',[AdminController::class,'EditPage'])->name('page.edit');
    Route::post('panel/page/edit/store/{id}',[AdminController::class,'StorePageEdit'])->name('page.edit.store');
    Route::get('panel/page/delete/{id}',[AdminController::class,'DeletePage'])->name('page.delete');

    // Slider
    Route::get('panel/slider/list',[AdminController::class,'Slides'])->name('slide.list');
    Route::get('panel/slider/add',[AdminController::class,'AddSlide'])->name('slide.add');
    Route::post('panel/slider/store',[AdminController::class,'StoreSlide'])->name('slide.store');
    Route::get('panel/slider/edit/{id}',[AdminController::class,'EditSlide'])->name('slide.edit');
    Route::post('panel/slider/edit/store/{id}',[AdminController::class,'UpdateSlide'])->name('slide.update');
    Route::get('panel/slider/delete/{id}',[AdminController::class,'DeleteSlide'])->name('slide.delete');

    // Category
    Route::get('panel/category/list',[AdminController::class,'ListCategory'])->name('category.list');
    Route::get('panel/product/edit',[AdminController::class,'GetCat'])->name('category.get');
    Route::post('panel/category/store',[AdminController::class,'StoreCategory'])->name('category.store');
    Route::get('panel/category/{id}',[AdminController::class,'RemoveCat'])->name('category.remove');

    // Users
    Route::get('panel/user/list',[AdminController::class, 'UserList'])->name('user.list');
    Route::get('panel/user/view/{id}',[AdminController::class, 'UserView'])->name('user.view');

    // Orders
    Route::get('panel/order/list',[AdminController::class, 'OrderList'])->name('order.list');
    Route::get('panel/order/add',[AdminController::class, 'OrderAdd'])->name('order.add');
    Route::get('panel/order/view/{id}',[AdminController::class, 'OrderView'])->name('order.view');
    Route::get('panel/order/update',[AdminController::class, 'OrderUpdate'])->name('order.update');

    // Transaction
    Route::get('panel/transaction/list',[AdminController::class, 'Transactions'])->name('transaction.list');
    Route::get('panel/transaction/get',[AdminController::class, 'GetTransaction'])->name('transaction.get');
    Route::get('panel/transaction/print/{id}',[AdminController::class, 'PrintTransaction'])->name('transaction.print');

    // Setting
    Route::get('panel/setting',[AdminController::class, 'Settings'])->name('settings');
    Route::get('panel/setting/fiscal',[AdminController::class, 'FiscalSettings'])->name('settings.fiscal');
    Route::get('panel/setting/color',[AdminController::class, 'Colors'])->name('colors');
    Route::get('panel/setting/getcolor',[AdminController::class, 'GetColor'])->name('color.get');
    Route::post('panel/setting/storecolor',[AdminController::class, 'StoreColor'])->name('color.store');
    Route::get('panel/setting/removecolor/{id}',[AdminController::class, 'ColorRemove'])->name('color.remove');
    // Route::get('panel/setting/size',[AdminController::class, 'Sizes'])->name('sizes');
    // Route::get('panel/setting/getsize',[AdminController::class, 'GetSize'])->name('size.get');
    // Route::post('panel/setting/storesize',[AdminController::class, 'StoreSize'])->name('size.store');
    // Route::get('panel/setting/removesize/{id}',[AdminController::class, 'SizeRemove'])->name('size.remove');
    Route::get('panel/setting/menus',[AdminController::class, 'Menus'])->name('menus');
    Route::post('panel/setting/storemenu',[AdminController::class, 'StoreMenu'])->name('menu.store');
    Route::get('panel/setting/getmenu',[AdminController::class, 'GetMenu'])->name('menu.get');
    Route::get('panel/setting/removemenu/{id}',[AdminController::class, 'MenuRemove'])->name('menu.remove');

    // Order
    Route::get('panel/contact',[AdminController::class, 'Contact'])->name('panel.contact');
    Route::get('panel/contact/view/{id}',[AdminController::class, 'ContactView'])->name('panel.contact.view');
    Route::get('panel/comment',[AdminController::class, 'Comment'])->name('panel.comment');
    Route::get('panel/comment/view/{id}',[AdminController::class, 'CommentView'])->name('panel.comment.view');
    Route::post('panel/comment/reply/{id}',[AdminController::class, 'CommentReply'])->name('panel.comment.reply');
    Route::get('panel/support',[AdminController::class, 'Support'])->name('panel.support');
    Route::get('panel/support/view/{id}',[AdminController::class, 'SupportView'])->name('panel.support.view');
    Route::get('panel/support/delete/{id}',[AdminController::class, 'SupportDelete'])->name('panel.support.delete');
    Route::post('panel/support/replay/{id}',[AdminController::class, 'SupportReply'])->name('panel.support.reply');
    require __DIR__.'/Admin/ProductRoute.php';

});
