<?php

use App\Http\Controllers\Admin\AdminDashboardController;
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

require __DIR__ . '/auth.php';
