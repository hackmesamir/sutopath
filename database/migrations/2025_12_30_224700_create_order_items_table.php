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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('product_variant_id')->nullable()->constrained()->onDelete('set null');
            
            // Product Information (snapshot at time of order)
            $table->string('product_name');
            $table->string('product_sku')->nullable();
            $table->text('product_image')->nullable();
            
            // Pricing
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->decimal('subtotal', 10, 2);
            
            // Product Variants (if applicable)
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->json('attributes')->nullable(); // For additional product attributes
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
