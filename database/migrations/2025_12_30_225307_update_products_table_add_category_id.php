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
        Schema::table('products', function (Blueprint $table) {
            // Add foreign key for category
            $table->foreignId('category_id')->nullable()->after('low_stock_threshold')->constrained('categories')->onDelete('set null');
            
            // Add foreign key for subcategory
            $table->foreignId('subcategory_id')->nullable()->after('category_id')->constrained('categories')->onDelete('set null');
            
            // Keep category and subcategory as strings for backward compatibility
            // They can be used as fallback or for filtering
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['subcategory_id']);
            $table->dropColumn(['category_id', 'subcategory_id']);
        });
    }
};
