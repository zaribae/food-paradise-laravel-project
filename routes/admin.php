<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProfileController;
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
});
