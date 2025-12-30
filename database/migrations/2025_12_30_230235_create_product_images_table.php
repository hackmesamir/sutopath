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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('image_path'); // Path to the image file
            $table->string('alt_text')->nullable(); // Alt text for accessibility
            $table->string('title')->nullable(); // Image title
            $table->boolean('is_primary')->default(false); // Primary/main product image
            $table->integer('sort_order')->default(0); // Order for displaying images
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Ensure only one primary image per product
            $table->index(['product_id', 'is_primary']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
