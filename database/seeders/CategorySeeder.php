<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Main Categories
        $womenWear = Category::create([
            'name' => "Women's Wear",
            'slug' => 'womens-wear',
            'description' => 'Beautiful collection of traditional and modern Punjabi wear for women',
            'icon' => '👗',
            'is_active' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'meta_title' => "Women's Punjabi Wear - Ecomarc Punjabi Shop",
            'meta_description' => 'Shop latest collection of Punjabi suits, Patiala suits, and traditional wear for women',
            'meta_keywords' => 'womens punjabi wear, punjabi suits, patiala suits, women clothing',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $mensWear = Category::create([
            'name' => "Men's Wear",
            'slug' => 'mens-wear',
            'description' => 'Traditional and modern Punjabi wear for men',
            'icon' => '👔',
            'is_active' => true,
            'is_featured' => true,
            'sort_order' => 2,
            'meta_title' => "Men's Punjabi Wear - Ecomarc Punjabi Shop",
            'meta_description' => 'Shop kurta pajama, sherwani, and traditional menswear',
            'meta_keywords' => 'mens punjabi wear, kurta pajama, mens traditional wear',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $kidsWear = Category::create([
            'name' => "Kids Wear",
            'slug' => 'kids-wear',
            'description' => 'Adorable Punjabi wear for kids',
            'icon' => '👶',
            'is_active' => true,
            'is_featured' => true,
            'sort_order' => 3,
            'meta_title' => 'Kids Punjabi Wear - Ecomarc Punjabi Shop',
            'meta_description' => 'Shop cute Punjabi suits and traditional wear for kids',
            'meta_keywords' => 'kids punjabi wear, children clothing, kids traditional wear',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $accessories = Category::create([
            'name' => 'Accessories',
            'slug' => 'accessories',
            'description' => 'Complete your look with beautiful accessories',
            'icon' => '💍',
            'is_active' => true,
            'is_featured' => false,
            'sort_order' => 4,
            'meta_title' => 'Punjabi Accessories - Ecomarc Punjabi Shop',
            'meta_description' => 'Shop dupattas, jewelry, and other Punjabi accessories',
            'meta_keywords' => 'punjabi accessories, dupatta, jewelry, traditional accessories',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Subcategories for Women's Wear
        Category::create([
            'name' => 'Punjabi Suits',
            'slug' => 'punjabi-suits',
            'description' => 'Traditional Punjabi suits with beautiful designs',
            'parent_id' => $womenWear->id,
            'is_active' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Patiala Suits',
            'slug' => 'patiala-suits',
            'description' => 'Stylish Patiala suits for modern look',
            'parent_id' => $womenWear->id,
            'is_active' => true,
            'is_featured' => true,
            'sort_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Anarkali Suits',
            'slug' => 'anarkali-suits',
            'description' => 'Elegant Anarkali suits for special occasions',
            'parent_id' => $womenWear->id,
            'is_active' => true,
            'is_featured' => false,
            'sort_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Salwar Kameez',
            'slug' => 'salwar-kameez',
            'description' => 'Comfortable Salwar Kameez sets',
            'parent_id' => $womenWear->id,
            'is_active' => true,
            'is_featured' => false,
            'sort_order' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Subcategories for Men's Wear
        Category::create([
            'name' => 'Kurta Pajama',
            'slug' => 'kurta-pajama',
            'description' => 'Traditional kurta pajama sets',
            'parent_id' => $mensWear->id,
            'is_active' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Sherwani',
            'slug' => 'sherwani',
            'description' => 'Elegant sherwani for weddings and special occasions',
            'parent_id' => $mensWear->id,
            'is_active' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Pathani Suits',
            'slug' => 'pathani-suits',
            'description' => 'Stylish Pathani suits',
            'parent_id' => $mensWear->id,
            'is_active' => true,
            'is_featured' => false,
            'sort_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Subcategories for Kids Wear
        Category::create([
            'name' => 'Kids Punjabi Suits',
            'slug' => 'kids-punjabi-suits',
            'description' => 'Cute Punjabi suits for kids',
            'parent_id' => $kidsWear->id,
            'is_active' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Kids Kurta Pajama',
            'slug' => 'kids-kurta-pajama',
            'description' => 'Traditional kurta pajama for kids',
            'parent_id' => $kidsWear->id,
            'is_active' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Subcategories for Accessories
        Category::create([
            'name' => 'Dupattas',
            'slug' => 'dupattas',
            'description' => 'Beautiful dupattas to complement your outfit',
            'parent_id' => $accessories->id,
            'is_active' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Jewelry',
            'slug' => 'jewelry',
            'description' => 'Traditional Punjabi jewelry',
            'parent_id' => $accessories->id,
            'is_active' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Footwear',
            'slug' => 'footwear',
            'description' => 'Traditional Punjabi footwear',
            'parent_id' => $accessories->id,
            'is_active' => true,
            'is_featured' => false,
            'sort_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
