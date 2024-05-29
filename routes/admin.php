<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DeliveryAddressesController;
use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentGatewaySettingController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Admin Profile Route
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Slider Route
    Route::resource('/slider', SliderController::class);

    // Benefit Route
    Route::patch('/benefit-title-update', [BenefitController::class, 'updateTitle'])->name('benefit.title.update');
    Route::resource('/benefit', BenefitController::class);

    // Product Route
    Route::resource('/product', ProductController::class);

    // Product Category Route
    Route::resource('/product-category', ProductCategoryController::class);

    // Product Gallery Route
    Route::get('/product-gallery/{productId}', [ProductGalleryController::class, 'index'])->name('product-gallery.show-index');
    Route::resource('/product-gallery', ProductGalleryController::class);

    // Product Size Route
    Route::get('/product-size/{productId}', [ProductSizeController::class, 'index'])->name('product-size.show-index');
    Route::resource('/product-size', ProductSizeController::class);

    // Product Option Route
    Route::resource('/product-option', ProductOptionController::class);

    // Orders Route
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{orderId}', [OrderController::class, 'show'])->name('orders.show');
    Route::delete('/orders/{orderId}', [OrderController::class, 'removeOrder'])->name('orders.destroy');

    Route::get('/orders/status/{orderId}', [OrderController::class, 'getOrderStatus'])->name('orders.status');
    Route::patch('/orders/status-update/{orderId}', [OrderController::class, 'updateStatus'])->name('orders.status-update');


    // Manage Ecommerce Route
    // Coupon Route
    Route::resource('/coupon', CouponController::class);

    // Delivery Area Routes
    Route::resource('/delivery-area', DeliveryAreaController::class);

    // Payment Gateway Settings Route
    Route::get('/payment-gateways-setting', [PaymentGatewaySettingController::class, 'index'])->name('payment-settings.index');
    Route::patch('/payment-gateways-setting', [PaymentGatewaySettingController::class, 'paypalSettingUpdate'])->name('payment-settings.update');

    // Setting Route
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::patch('/setting/general-setting', [SettingController::class, 'updateGeneralSetting'])->name('setting.general-setting.update');
});
