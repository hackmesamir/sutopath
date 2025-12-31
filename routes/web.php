<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\User\Auth\UserRegisterController;
use App\Http\Controllers\User\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// User Authentication Routes (without /user prefix for convenience)
Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class, 'login'])->name('login');
Route::get('/register', [UserRegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserRegisterController::class, 'register'])->name('register');

// Protected User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');
});

// Payment Routes
Route::prefix('payments')->name('payments.')->group(function () {
    Route::post('/initialize', [PaymentController::class, 'initialize'])->name('initialize');
    Route::post('/callback', [PaymentController::class, 'callback'])->name('callback');
    Route::post('/webhook', [PaymentController::class, 'webhook'])->name('webhook');
    Route::post('/{payment}/refund', [PaymentController::class, 'refund'])->name('refund');
});

