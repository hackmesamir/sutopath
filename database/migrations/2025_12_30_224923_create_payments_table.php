<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('payment_number')->unique();
            
            // Payment Method
            $table->enum('payment_method', [
                'cash_on_delivery',
                'online_payment',
                'bank_transfer',
                'upi',
                'credit_card',
                'debit_card',
                'wallet',
                'net_banking'
            ]);
            
            // Payment Gateway Information
            $table->string('gateway')->nullable(); // razorpay, stripe, paypal, etc.
            $table->string('gateway_payment_id')->nullable();
            $table->string('gateway_order_id')->nullable();
            
            // Transaction Details
            $table->string('transaction_id')->unique()->nullable();
            $table->string('reference_number')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('INR');
            
            // Payment Status
            $table->enum('status', [
                'pending',
                'processing',
                'completed',
                'failed',
                'cancelled',
                'refunded',
                'partially_refunded'
            ])->default('pending');
            
            // Payment Response
            $table->json('gateway_response')->nullable(); // Store full gateway response
            $table->text('failure_reason')->nullable();
            $table->text('notes')->nullable();
            
            // Timestamps
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('failed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
