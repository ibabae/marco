<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAccess;
use App\Models\Product;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/refresh-captcha',function(){
    return response()->json(['captcha' => captcha_src()]);
});

Route::get('/', [PublicController::class, 'Home'])->name('home');
Route::get('test',[PublicController::class, 'test'])->name('test');
Route::get('pay/{id}',[PublicController::class, 'Pay'])->name('pay');
Route::get('verify',[PublicController::class, 'Verify'])->name('verify');

Route::get('login',[PublicController::class, 'Auth'])->name('login');
Route::post('login',[PublicController::class, 'AuthPost'])->name('login.post');

// Route::get('login',[PublicController::class, 'SignIn'])->name('login');
// Route::post('login',[PublicController::class, 'SignInPost'])->name('login.post');
// Route::get('register',[PublicController::class, 'SignUp'])->name('register');
// Route::post('register',[PublicController::class, 'SignUpPost'])->name('register.post');
// Route::get('forget',[PublicController::class, 'Forget'])->name('forget');
// Route::post('forget',[PublicController::class, 'ForgetPost'])->name('forget.post');

Route::get('blog',[PublicController::class, 'Blog'])->name('blog');
Route::get('about',[PublicController::class, 'About'])->name('about');
Route::get('contact',[PublicController::class, 'Contact'])->name('contact');
Route::post('contact',[PublicController::class, 'ContactStore'])->name('contact.store');

Route::get('page/{id}/{slug?}',[PublicController::class, 'Page'])->name('page');

Route::post('comment/{id}',[PublicController::class, 'Comment'])->name('comment');
Route::get('account',[UserController::class, 'Account'])->name('account');
Route::get('account/orders',[UserController::class, 'AccountOrder'])->name('account.orders');
Route::get('account/order/{id}',[UserController::class, 'AccountViewOrder'])->name('account.orders.view');
Route::get('account/track',[UserController::class, 'OrderTrack'])->name('account.track');
Route::get('account/address',[UserController::class, 'Address'])->name('account.address');
Route::get('account/addaddress',[UserController::class, 'AddAddress'])->name('account.address.add');
Route::post('account/addaddress',[UserController::class, 'AddressPost'])->name('account.address.post');
Route::get('account/editaddress/{id}',[UserController::class, 'EditAddress'])->name('account.address.edit');
Route::post('account/editaddress/{id}',[UserController::class, 'UpdateAddress'])->name('account.address.update');
Route::get('account/profile',[UserController::class, 'AccountProfile'])->name('account.profile');
Route::get('logout',[UserController::class, 'Logout'])->name('logout');
Route::get('reload-captcha', [CaptchaController::class, 'reloadCaptcha']);
Route::get('product/{id}/{title?}',[PublicController::class, 'Product'])->name('product');
Route::get('products',[PublicController::class, 'Products'])->name('products');

Route::get('search',[PublicController::class, 'Search'])->name('search');
Route::post('sort',[PublicController::class, 'Sort'])->name('sort');

Route::get('stock',[PublicController::class, 'Stock'])->name('stock');
Route::get('add-to-cart',[PublicController::class, 'AddToCart'])->name('addtocart');
Route::get('get-cart',[PublicController::class, 'GetCart'])->name('getcart');
Route::get('remove-item',[PublicController::class, 'RemoveItem'])->name('removeitem');
Route::get('updatecart',[PublicController::class, 'UpdateCart'])->name('updatecart');
Route::get('cart',[ShopController::class, 'Cart'])->name('cart');
Route::get('checkout',[ShopController::class, 'Checkout'])->name('checkout');
Route::get('wishlist',[ShopController::class, 'Wishlist'])->name('wishlist');
Route::post('payout',[ShopController::class, 'Payout'])->name('payout');
Route::get('redirect/{id}',[ShopController::class, 'Redirect'])->name('redirect');
// Route::get('verify/{id}',[ShopController::class, 'Verify'])->name('verify');

Route::middleware([AdminAccess::class])->group(function(){
    Route::get('panel',[AdminController::class, 'Panel'])->name('panel');

    // Product
    Route::post('panel/product/list',[AdminController::class,'SearchProduct'])->name('product.search');
    Route::get('panel/product/list',[AdminController::class,'ListProduct'])->name('product.list');
    Route::get('panel/product/add',[AdminController::class,'AddProduct'])->name('product.add');
    Route::post('panel/product/store',[AdminController::class,'StoreProduct'])->name('product.store');
    Route::get('panel/product/edit/{id}',[AdminController::class,'EditProduct'])->name('product.edit');
    Route::post('panel/product/edit/store/{id}',[AdminController::class,'StoreEdit'])->name('product.edit.store');

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
    Route::get('panel/setting/size',[AdminController::class, 'Sizes'])->name('sizes');
    Route::get('panel/setting/getsize',[AdminController::class, 'GetSize'])->name('size.get');
    Route::post('panel/setting/storesize',[AdminController::class, 'StoreSize'])->name('size.store');
    Route::get('panel/setting/removesize/{id}',[AdminController::class, 'SizeRemove'])->name('size.remove');
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
});

// require __DIR__.'/auth.php';
