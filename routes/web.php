<?php

// use App\Http\Controllers\ProfileController;
// use Illuminate\Foundation\Application;
// use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Home', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
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

Route::post('/update-page', [UserController::class, 'updatePage']);

Route::get('/', [PublicController::class, 'Home'])->name('home');
Route::get('pay/{id}',[PublicController::class, 'Pay'])->name('pay');
Route::get('verify',[PublicController::class, 'Verify'])->name('verify');

Route::middleware('throttle:10,1')->controller(AuthController::class)->prefix('login')->name('login')->group(function () {
    Route::get('', 'index');
    Route::post('', 'store')->name('.store');
});

Route::get('page/{id}/{slug?}',[PublicController::class, 'Page'])->name('page');

Route::post('comment/{id}',[PublicController::class, 'Comment'])->name('comment');

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

