<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'title' => 'Welcome to Ecomarc Punjabi Shop',
                'description' => 'Discover Authentic Punjabi Products - Quality, Tradition, and Excellence',
                'image' => 'banners/homepage-slider-1.jpg',
                'mobile_image' => 'banners/homepage-slider-1-mobile.jpg',
                'link' => '#products',
                'button_text' => 'Shop Now',
                'button_link' => '#products',
                'position' => 'homepage_slider',
                'type' => 'slider',
                'start_date' => null,
                'end_date' => null,
                'is_active' => true,
                'open_in_new_tab' => false,
                'sort_order' => 1,
                'alt_text' => 'Welcome to Ecomarc Punjabi Shop',
                'settings' => [
                    'text_color' => '#FFFFFF',
                    'button_color' => '#F97316',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'New Collection 2024',
                'description' => 'Latest Punjabi fashion trends for the season',
                'image' => 'banners/homepage-slider-2.jpg',
                'mobile_image' => 'banners/homepage-slider-2-mobile.jpg',
                'link' => '#products',
                'button_text' => 'Explore Collection',
                'button_link' => '#products',
                'position' => 'homepage_slider',
                'type' => 'slider',
                'start_date' => null,
                'end_date' => null,
                'is_active' => true,
                'open_in_new_tab' => false,
                'sort_order' => 2,
                'alt_text' => 'New Collection 2024',
                'settings' => [
                    'text_color' => '#FFFFFF',
                    'button_color' => '#16A34A',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Special Offer - Up to 30% Off',
                'description' => 'Limited time offer on selected items',
                'image' => 'banners/homepage-slider-3.jpg',
                'mobile_image' => 'banners/homepage-slider-3-mobile.jpg',
                'link' => '#products',
                'button_text' => 'Shop Sale',
                'button_link' => '#products',
                'position' => 'homepage_slider',
                'type' => 'promotional',
                'start_date' => null,
                'end_date' => now()->addDays(30), // Expires in 30 days
                'is_active' => true,
                'open_in_new_tab' => false,
                'sort_order' => 3,
                'alt_text' => 'Special Offer - Up to 30% Off',
                'settings' => [
                    'text_color' => '#FFFFFF',
                    'button_color' => '#DC2626',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Free Shipping on Orders Above ₹2000',
                'description' => 'Enjoy free shipping on all orders above ₹2000',
                'image' => 'banners/homepage-top-1.jpg',
                'mobile_image' => null,
                'link' => null,
                'button_text' => null,
                'button_link' => null,
                'position' => 'homepage_top',
                'type' => 'announcement',
                'start_date' => null,
                'end_date' => null,
                'is_active' => true,
                'open_in_new_tab' => false,
                'sort_order' => 1,
                'alt_text' => 'Free Shipping Offer',
                'settings' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Women\'s Collection',
                'description' => 'Beautiful traditional and modern Punjabi wear',
                'image' => 'banners/homepage-middle-1.jpg',
                'mobile_image' => 'banners/homepage-middle-1-mobile.jpg',
                'link' => '#categories',
                'button_text' => 'Shop Women\'s Wear',
                'button_link' => '#categories',
                'position' => 'homepage_middle',
                'type' => 'promotional',
                'start_date' => null,
                'end_date' => null,
                'is_active' => true,
                'open_in_new_tab' => false,
                'sort_order' => 1,
                'alt_text' => 'Women\'s Collection',
                'settings' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Men\'s Collection',
                'description' => 'Traditional and modern menswear',
                'image' => 'banners/homepage-middle-2.jpg',
                'mobile_image' => 'banners/homepage-middle-2-mobile.jpg',
                'link' => '#categories',
                'button_text' => 'Shop Men\'s Wear',
                'button_link' => '#categories',
                'position' => 'homepage_middle',
                'type' => 'promotional',
                'start_date' => null,
                'end_date' => null,
                'is_active' => true,
                'open_in_new_tab' => false,
                'sort_order' => 2,
                'alt_text' => 'Men\'s Collection',
                'settings' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Banner::insert($banners);
    }
}
