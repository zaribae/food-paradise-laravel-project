<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// User Routes
Route::group([], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::patch('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('/profile/picture', [ProfileController::class, 'updatePicture'])->name('profile.picture.update');
})->middleware(['auth', 'verified']);

// Product Routes
Route::get('/product/{slug}', [HomeController::class, 'showProduct'])->name('product.show');

// Product show Modal Routes
Route::get('/product-modal/{productId}', [HomeController::class, 'loadProductModal'])->name('product.load-modal');

// Add product to cart Routes
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('product.add-to-cart');
// Refresh product cart after adding new product Routes
Route::get('/get-cart-product', [CartController::class, 'refreshCartProduct'])->name('product.refresh-cart');
// Delete product from cart
Route::get('/remove-cart-product/{rowId}', [CartController::class, 'deleteProduct'])->name('product.remove-cart');

// Cart page route
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart-product-clear', [CartController::class, 'productRemoveAll'])->name('cart.product-clear');
Route::post('/cart-product-quantity-update', [CartController::class, 'productQuantityUpdate'])->name('cart.quantity-update');

// Coupon Routes
Route::post('/coupon-apply', [HomeController::class, 'applyCoupon'])->name('coupon.apply');
Route::get('/coupon-remove', [HomeController::class, 'removeCoupon'])->name('coupon.remove');

require __DIR__ . '/auth.php';
