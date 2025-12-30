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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image'); // Banner image path
            $table->string('mobile_image')->nullable(); // Mobile optimized image
            
            // Link and CTA
            $table->string('link')->nullable(); // URL to redirect when clicked
            $table->string('button_text')->nullable(); // CTA button text
            $table->string('button_link')->nullable(); // CTA button link
            
            // Position and Type
            $table->enum('position', [
                'homepage_slider',
                'homepage_top',
                'homepage_middle',
                'homepage_bottom',
                'sidebar',
                'category_page',
                'product_page',
                'footer'
            ])->default('homepage_slider');
            
            $table->enum('type', [
                'slider',
                'static',
                'promotional',
                'advertisement',
                'announcement'
            ])->default('slider');
            
            // Scheduling
            $table->timestamp('start_date')->nullable(); // When banner should start showing
            $table->timestamp('end_date')->nullable(); // When banner should stop showing
            
            // Display Settings
            $table->boolean('is_active')->default(true);
            $table->boolean('open_in_new_tab')->default(false);
            $table->integer('sort_order')->default(0);
            
            // Additional Settings
            $table->text('alt_text')->nullable(); // Alt text for image
            $table->json('settings')->nullable(); // Additional settings (colors, animations, etc.)
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
