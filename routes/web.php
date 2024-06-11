<?php

use App\Events\RealTimeOrderPlacedNotificationEvent;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LivechatController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Models\Order;
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

// About Us Route
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Contact Route
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContactMessage'])->name('contact.send-message');

// Privacy & Policy Route
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy.index');

// Terms & Condition Route
Route::get('/terms-condition', [HomeController::class, 'termsCondition'])->name('terms-condition.index');

// Reservation Route
Route::post('/reservation', [HomeController::class, 'reservation'])->name('reservation.store')->middleware(['auth', 'verified']);

// User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::patch('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('/profile/picture', [ProfileController::class, 'updatePicture'])->name('profile.picture.update');
    Route::post('/profile/address', [DashboardController::class, 'createAddress'])->name('profile.address.create');
    Route::patch('/profile/address/{addressId}/edit', [DashboardController::class, 'updateAddress'])->name('profile.address.update');
    Route::delete('/profile/address/{addressId}', [DashboardController::class, 'removeAddress'])->name('profile.address.remove');

    // Livechat Routes
    Route::post('/livechat/send-message', [LivechatController::class, 'sendMessage'])->name('livechat.send-message');
    Route::get('/livechat/get-messages/{senderId}', [LivechatController::class, 'getMessages'])->name('livechat.get-messages');
});

// Chefs Routes
Route::get('/chefs', [HomeController::class, 'chefs'])->name('chefs.index');

//Testimonials Route
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials.index');

// Blogs Route
Route::get('/blogs', [HomeController::class, 'blog'])->name('blogs');
Route::get('/blogs/{slug}', [HomeController::class, 'blogDetails'])->name('blogs.view');
Route::post('/blogs/comment/{blogId}', [HomeController::class, 'blogCommentStore'])->name('blogs.comment')->middleware(['auth', 'verified']);

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

// Checkout Routes

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/checkout/{addressId}/delivery-total', [CheckoutController::class, 'calculateDeliveryTotal'])->name('checkout.delivery-total');
    Route::post('/checkout', [CheckoutController::class, 'checkoutPayment'])->name('checkout.redirect.payment');

    // Payment Route
    Route::get('/checkout/payment', [PaymentController::class, 'index'])->name('checkout.payment.index');
    Route::post('/checkout/payment', [PaymentController::class, 'makePayment'])->name('checkout.payment.create');

    Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment-success');
    Route::get('/payment-canceled', [PaymentController::class, 'paymentCancel'])->name('payment-cancel');

    Route::get('/paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
    Route::get('/paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.payment.success');
    Route::get('/paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.payment.cancel');
});

require __DIR__ . '/auth.php';
