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
Route::post('remove-image',[PublicController::class, 'test'])->name('test');
Route::get('pay/{id}',[PublicController::class, 'Pay'])->name('pay');
Route::get('verify',[PublicController::class, 'Verify'])->name('verify');

Route::get('login',[PublicController::class, 'Auth'])->name('auth');
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
Route::get('account/address/delete/{id}',[UserController::class, 'RemoveAddress'])->name('account.address.delete');
Route::get('account/profile',[UserController::class, 'AccountProfile'])->name('account.profile');
Route::post('account/profile',[UserController::class, 'ProfileUpdate'])->name('account.profile.update');
Route::get('logout',[UserController::class, 'Logout'])->name('logout');
// Route::get('reload-captcha', [CaptchaController::class, 'reloadCaptcha']);
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

Route::middleware(['auth'])->group(function () {
    require __DIR__.'/AdminRoutes.php';
    require __DIR__.'/OldAdminRoutes.php';
});
