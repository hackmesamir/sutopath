<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Payment Routes
Route::prefix('payments')->name('payments.')->group(function () {
    Route::post('/initialize', [PaymentController::class, 'initialize'])->name('initialize');
    Route::post('/callback', [PaymentController::class, 'callback'])->name('callback');
    Route::post('/webhook', [PaymentController::class, 'webhook'])->name('webhook');
    Route::post('/{payment}/refund', [PaymentController::class, 'refund'])->name('refund');
});
