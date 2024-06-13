<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AppDownloadController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DailyOfferController;
use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\LivechatController;
use App\Http\Controllers\Admin\MenuSliderController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentGatewaySettingController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ReservationTimeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TermsConditionController;
use App\Http\Controllers\Admin\TestimonialController;

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Admin Profile Route
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Slider Route
    Route::resource('/slider', SliderController::class);

    // Daily Offer Route
    Route::patch('/daily-offer-title-update', [DailyOfferController::class, 'updateTitle'])->name('daily-offer.title.update');
    Route::get('/daily-offer/search-product', [DailyOfferController::class, 'searchProduct'])->name('daily-offer.search-product');
    Route::resource('/daily-offer', DailyOfferController::class);

    // Menu Slider Route
    Route::resource('/menu-slider', MenuSliderController::class);

    // Chef Section Route
    Route::patch('/chef-title-update', [ChefController::class, 'updateTitle'])->name('chef.title.update');
    Route::resource('/chef', ChefController::class);

    // App Download Section Route
    Route::get('/app-download', [AppDownloadController::class, 'index'])->name('app-download');
    Route::post('/app-download', [AppDownloadController::class, 'store'])->name('app-download.store');

    // Testimonials Section Route
    Route::patch('/testimonial-title-update', [TestimonialController::class, 'updateTitle'])->name('testimonials.title.update');
    Route::resource('/testimonials', TestimonialController::class);

    // Counter Route
    Route::get('/counter', [CounterController::class, 'index'])->name('counter.index');
    Route::patch('/counter', [CounterController::class, 'updateCounter'])->name('counter.update');

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

    Route::get('/pending-orders', [OrderController::class, 'pendingOrder'])->name('pending-orders.index');
    Route::get('/in-process-orders', [OrderController::class, 'inProcessOrder'])->name('in-process-orders.index');
    Route::get('/delivered-orders', [OrderController::class, 'deliveredOrder'])->name('delivered-orders.index');
    Route::get('/declined-orders', [OrderController::class, 'declinedOrder'])->name('declined-orders.index');

    // Order Notification Routes
    Route::get('/notification-clear', [AdminDashboardController::class, 'clearNotification'])->name('clear-notification');

    // Manage Ecommerce Route
    // Coupon Route
    Route::resource('/coupon', CouponController::class);

    // Delivery Area Routes
    Route::resource('/delivery-area', DeliveryAreaController::class);

    // Payment Gateway Settings Route
    Route::get('/payment-gateways-setting', [PaymentGatewaySettingController::class, 'index'])->name('payment-settings.index');
    Route::patch('/payment-gateways-setting', [PaymentGatewaySettingController::class, 'paypalSettingUpdate'])->name('payment-settings.update');

    // Livechat Routes
    Route::get('/livechat', [LivechatController::class, 'index'])->name('livechat.index');
    Route::get('/livechat/get-messages/{senderId}', [LivechatController::class, 'getMessages'])->name('livechat.get-messages');
    Route::post('/livechat/send-message', [LivechatController::class, 'sendMessages'])->name('livechat.send-messages');

    // Blog Category Routes
    Route::resource('/blog-category', BlogCategoryController::class);

    // Blog Routes
    Route::get('/blogs/comments', [BlogController::class, 'blogComment'])->name('blog.comments.index');
    Route::get('/blogs/comments/{commentId}', [BlogController::class, 'commentStatusUpdate'])->name('blog.comments-status.update');
    Route::delete('/blogs/comments/{commentId}', [BlogController::class, 'commentDelete'])->name('blog.comments.destroy');
    Route::resource('/blogs', BlogController::class);

    // About Routes
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::patch('/about', [AboutController::class, 'update'])->name('about.update');

    // Privacy & Policy Routes
    Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy.index');
    Route::patch('/privacy-policy', [PrivacyPolicyController::class, 'update'])->name('privacy-policy.update');

    // Terms & Conditions Routes
    Route::get('/terms-condition', [TermsConditionController::class, 'index'])->name('terms-condition.index');
    Route::patch('/terms-condition', [TermsConditionController::class, 'update'])->name('terms-condition.update');

    // Terms & Conditions Routes
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::patch('/contact', [ContactController::class, 'update'])->name('contact.update');

    // Reservation Time Routes
    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation.index');
    Route::post('/reservation', [ReservationController::class, 'update'])->name('reservation.update');
    Route::delete('/reservation/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');

    Route::resource('/reservation-time', ReservationTimeController::class);

    // Social Link Routes
    Route::resource('/social-link', SocialLinkController::class);

    // Footer Routes
    Route::get('/footer-info', [FooterInfoController::class, 'index'])->name('footer-info.index');
    Route::patch('/footer-info', [FooterInfoController::class, 'update'])->name('footer-info.update');

    // News Letter Route
    Route::get('/news-letter', [NewsletterController::class, 'index'])->name('news-letter.index');
    Route::post('/news-letter', [NewsletterController::class, 'sendNewsletter'])->name('news-letter.send');

    // Setting Route
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::patch('/setting/general-setting', [SettingController::class, 'updateGeneralSetting'])->name('setting.general-setting.update');

    // Pusher Setting Route
    Route::patch('/pusher-setting', [SettingController::class, 'updatePusherSetting'])->name('pusher-setting.update');

    // Mail Setting Route
    Route::patch('/mail-setting', [SettingController::class, 'updateMailSetting'])->name('mail-setting.update');
});
