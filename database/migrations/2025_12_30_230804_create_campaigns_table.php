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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Campaign name
            $table->string('code')->unique()->nullable(); // Coupon code (optional)
            $table->text('description')->nullable();
            
            // Discount Settings
            $table->enum('discount_type', [
                'percentage',
                'fixed_amount',
                'free_shipping',
                'buy_x_get_y'
            ])->default('percentage');
            
            $table->decimal('discount_value', 10, 2)->nullable(); // Percentage or fixed amount
            $table->decimal('max_discount_amount', 10, 2)->nullable(); // Maximum discount cap
            $table->decimal('min_order_amount', 10, 2)->default(0); // Minimum order value
            
            // Applicability
            $table->enum('applicable_to', [
                'all_products',
                'specific_products'
            ])->default('all_products');
            
            // Usage Limits
            $table->integer('usage_limit')->nullable(); // Total usage limit
            $table->integer('usage_limit_per_user')->nullable(); // Per user limit
            $table->integer('used_count')->default(0); // Track usage
            
            // Validity
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->boolean('is_active')->default(true);
            
            // Additional Settings
            $table->boolean('is_first_order_only')->default(false);
            $table->boolean('is_new_user_only')->default(false);
            $table->text('terms_conditions')->nullable();
            $table->string('banner_image')->nullable(); // Campaign banner
            $table->json('settings')->nullable(); // Additional settings
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index('code');
            $table->index('start_date');
            $table->index('end_date');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
