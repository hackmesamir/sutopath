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
        Schema::create('shipping_charges', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Standard Shipping", "Express Shipping"
            $table->string('shipping_method')->default('standard'); // standard, express, overnight
            
            // Location-based
            $table->string('state')->nullable(); // Specific state, null for all states
            $table->string('city')->nullable(); // Specific city, null for all cities
            $table->string('pincode')->nullable(); // Specific pincode range, null for all
            
            // Weight-based charges (in kg)
            $table->decimal('min_weight', 8, 2)->nullable(); // Minimum weight in kg
            $table->decimal('max_weight', 8, 2)->nullable(); // Maximum weight in kg
            
            // Order value-based charges
            $table->decimal('min_order_value', 10, 2)->nullable(); // Minimum order value
            $table->decimal('max_order_value', 10, 2)->nullable(); // Maximum order value
            
            // Charges
            $table->decimal('charge', 10, 2); // Shipping charge amount
            $table->decimal('free_shipping_threshold', 10, 2)->nullable(); // Free shipping above this amount
            
            // Additional settings
            $table->integer('estimated_days')->nullable(); // Estimated delivery days
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_charges');
    }
};
