<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;

// Admin Authentication Routes
// Login Routes (Public)
Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [AdminLoginController::class, 'login'])->name('login');

// Protected Admin Routes
Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
});

