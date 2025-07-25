<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminHomeBannerController;
use App\Http\Controllers\Admin\AdminHomeWelcomeController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/registration', [FrontController::class, 'registration'])->name('registration');
Route::post('/registration_submit', [FrontController::class, 'registration_submit'])->name('registration_submit');
Route::get('/registration_verify/{token}/{email}', [FrontController::class, 'registration_verify'])->name('registration_verify');
Route::get('/login', [FrontController::class, 'login'])->name('login');
Route::post('/login', [FrontController::class, 'login_submit'])->name('login_submit');
Route::get('/forget-password', [FrontController::class, 'forget_password'])->name('forget_password');
Route::post('/forget-password', [FrontController::class, 'forget_password_submit'])->name('forget_password_submit');
Route::get('/reset-password/{token}/{email}', [FrontController::class, 'reset_password'])->name('reset_password');
Route::post('/reset-password/{token}/{email}', [FrontController::class, 'reset_password_submit'])->name('reset_password_submit');

// User
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard', [FrontController::class, 'dashboard'])->name('user_dashboard');
    Route::get('/profile', [FrontController::class, 'profile'])->name('user_profile');
    Route::post('/profile', [FrontController::class, 'profile_submit'])->name('user_profile_submit');
    Route::get('/logout', [FrontController::class, 'logout'])->name('logout');
});

// Admin
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/profile', [AdminAuthController::class, 'profile'])->name('admin_profile');
    Route::post('/profile', [AdminAuthController::class, 'profile_submit'])->name('admin_profile_submit');
    Route::get('/home-banner', [AdminHomeBannerController::class, 'index'])->name('admin_home_banner');
    Route::post('/home-banner', [AdminHomeBannerController::class, 'update'])->name('admin_home_banner_update');
    Route::get('/home-welcome', [AdminHomeWelcomeController::class, 'index'])->name('admin_home_welcome');
    Route::post('/home-welcome', [AdminHomeWelcomeController::class, 'update'])->name('admin_home_welcome_update');
});
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/login');
    });
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin_login');
    Route::post('/login', [AdminAuthController::class, 'login_submit'])->name('admin_login_submit');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');
    Route::get('/forget-password', [AdminAuthController::class, 'forget_password'])->name('admin_forget_password');
    Route::post('/forget_password_submit', [AdminAuthController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
    Route::get('/reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password'])->name('admin_reset_password');
    Route::post('/reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password_submit'])->name('admin_reset_password_submit');
});
