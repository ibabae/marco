<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAccess;
use Illuminate\Support\Facades\Route;

Route::middleware([AdminAccess::class])->group(function(){
    Route::get('old/panel',[AdminController::class, 'Panel'])->name('old.panel');

    // Product
    Route::post('old/panel/product/list',[AdminController::class,'SearchProduct'])->name('old.product.search');
    Route::get('old/panel/product/list',[AdminController::class,'ListProduct'])->name('old.product.list');
    Route::get('old/panel/product/add',[AdminController::class,'AddProduct'])->name('old.product.add');
    Route::post('old/panel/product/store',[AdminController::class,'StoreProduct'])->name('old.product.store');
    Route::get('old/panel/product/edit/{id}',[AdminController::class,'EditProduct'])->name('old.product.edit');
    Route::post('old/panel/product/edit/store/{id}',[AdminController::class,'StoreEdit'])->name('old.product.edit.store');

    // Pages
    Route::get('old/panel/page/list',[AdminController::class,'ListPage'])->name('old.page.list');
    Route::get('old/panel/page/add',[AdminController::class,'AddPage'])->name('old.page.add');
    Route::post('old/panel/page/store',[AdminController::class,'StorePage'])->name('old.page.store');
    Route::get('old/panel/page/edit/{id}',[AdminController::class,'EditPage'])->name('old.page.edit');
    Route::post('old/panel/page/edit/store/{id}',[AdminController::class,'StorePageEdit'])->name('old.page.edit.store');
    Route::get('old/panel/page/delete/{id}',[AdminController::class,'DeletePage'])->name('old.page.delete');

    // Slider
    Route::get('old/panel/slider/list',[AdminController::class,'Slides'])->name('old.slide.list');
    Route::get('old/panel/slider/add',[AdminController::class,'AddSlide'])->name('old.slide.add');
    Route::post('old/panel/slider/store',[AdminController::class,'StoreSlide'])->name('old.slide.store');
    Route::get('old/panel/slider/edit/{id}',[AdminController::class,'EditSlide'])->name('old.slide.edit');
    Route::post('old/panel/slider/edit/store/{id}',[AdminController::class,'UpdateSlide'])->name('old.slide.update');
    Route::get('old/panel/slider/delete/{id}',[AdminController::class,'DeleteSlide'])->name('old.slide.delete');

    // Category
    Route::get('old/panel/category/list',[AdminController::class,'ListCategory'])->name('old.category.list');
    Route::get('old/panel/product/edit',[AdminController::class,'GetCat'])->name('old.category.get');
    Route::post('old/panel/category/store',[AdminController::class,'StoreCategory'])->name('old.category.store');
    Route::get('old/panel/category/{id}',[AdminController::class,'RemoveCat'])->name('old.category.remove');

    // Users
    Route::get('old/panel/user/list',[AdminController::class, 'UserList'])->name('old.user.list');
    Route::get('old/panel/user/view/{id}',[AdminController::class, 'UserView'])->name('old.user.view');

    // Orders
    Route::get('old/panel/order/list',[AdminController::class, 'OrderList'])->name('old.order.list');
    Route::get('old/panel/order/add',[AdminController::class, 'OrderAdd'])->name('old.order.add');
    Route::get('old/panel/order/view/{id}',[AdminController::class, 'OrderView'])->name('old.order.view');
    Route::get('old/panel/order/update',[AdminController::class, 'OrderUpdate'])->name('old.order.update');

    // Transaction
    Route::get('old/panel/transaction/list',[AdminController::class, 'Transactions'])->name('old.transaction.list');
    Route::get('old/panel/transaction/get',[AdminController::class, 'GetTransaction'])->name('old.transaction.get');
    Route::get('old/panel/transaction/print/{id}',[AdminController::class, 'PrintTransaction'])->name('old.transaction.print');

    // Setting
    Route::get('old/panel/setting',[AdminController::class, 'Settings'])->name('old.settings');
    Route::get('old/panel/setting/fiscal',[AdminController::class, 'FiscalSettings'])->name('old.settings.fiscal');
    Route::get('old/panel/setting/color',[AdminController::class, 'Colors'])->name('old.colors');
    Route::get('old/panel/setting/getcolor',[AdminController::class, 'GetColor'])->name('old.color.get');
    Route::post('old/panel/setting/storecolor',[AdminController::class, 'StoreColor'])->name('old.color.store');
    Route::get('old/panel/setting/removecolor/{id}',[AdminController::class, 'ColorRemove'])->name('old.color.remove');
    Route::get('old/panel/setting/size',[AdminController::class, 'Sizes'])->name('old.sizes');
    Route::get('old/panel/setting/getsize',[AdminController::class, 'GetSize'])->name('old.size.get');
    Route::post('old/panel/setting/storesize',[AdminController::class, 'StoreSize'])->name('old.size.store');
    Route::get('old/panel/setting/removesize/{id}',[AdminController::class, 'SizeRemove'])->name('old.size.remove');
    Route::get('old/panel/setting/menus',[AdminController::class, 'Menus'])->name('old.menus');
    Route::post('old/panel/setting/storemenu',[AdminController::class, 'StoreMenu'])->name('old.menu.store');
    Route::get('old/panel/setting/getmenu',[AdminController::class, 'GetMenu'])->name('old.menu.get');
    Route::get('old/panel/setting/removemenu/{id}',[AdminController::class, 'MenuRemove'])->name('old.menu.remove');

    // Order
    Route::get('old/panel/contact',[AdminController::class, 'Contact'])->name('old.panel.contact');
    Route::get('old/panel/contact/view/{id}',[AdminController::class, 'ContactView'])->name('old.panel.contact.view');
    Route::get('old/panel/comment',[AdminController::class, 'Comment'])->name('old.panel.comment');
    Route::get('old/panel/comment/view/{id}',[AdminController::class, 'CommentView'])->name('old.panel.comment.view');
    Route::post('old/panel/comment/reply/{id}',[AdminController::class, 'CommentReply'])->name('old.panel.comment.reply');
    Route::get('old/panel/support',[AdminController::class, 'Support'])->name('old.panel.support');
    Route::get('old/panel/support/view/{id}',[AdminController::class, 'SupportView'])->name('old.panel.support.view');
    Route::get('old/panel/support/delete/{id}',[AdminController::class, 'SupportDelete'])->name('old.panel.support.delete');
    Route::post('old/panel/support/replay/{id}',[AdminController::class, 'SupportReply'])->name('old.panel.support.reply');
});
