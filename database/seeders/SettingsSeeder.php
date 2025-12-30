<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Site Basic Information
            [
                'key' => 'site_title',
                'value' => 'Ecomarc Punjabi Shop',
                'type' => 'text',
                'description' => 'Website title',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_logo',
                'value' => '/images/logo.png',
                'type' => 'image',
                'description' => 'Website logo path',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_favicon',
                'value' => '/images/favicon.ico',
                'type' => 'image',
                'description' => 'Website favicon path',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_description',
                'value' => 'Your trusted destination for authentic Punjabi products. Quality, tradition, and excellence.',
                'type' => 'text',
                'description' => 'Website meta description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_keywords',
                'value' => 'Punjabi shop, traditional wear, Punjabi suits, Patiala suits, Indian clothing',
                'type' => 'text',
                'description' => 'Website meta keywords',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Contact Information
            [
                'key' => 'contact_email',
                'value' => 'info@ecomarcpunjabi.com',
                'type' => 'email',
                'description' => 'Contact email address',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'contact_phone',
                'value' => '+91 123 456 7890',
                'type' => 'phone',
                'description' => 'Contact phone number',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'contact_address',
                'value' => '123 Punjabi Street, Amritsar, Punjab, India',
                'type' => 'text',
                'description' => 'Business address',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Social Media Links
            [
                'key' => 'social_facebook',
                'value' => 'https://facebook.com/ecomarcpunjabi',
                'type' => 'url',
                'description' => 'Facebook page URL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'social_twitter',
                'value' => 'https://twitter.com/ecomarcpunjabi',
                'type' => 'url',
                'description' => 'Twitter profile URL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://instagram.com/ecomarcpunjabi',
                'type' => 'url',
                'description' => 'Instagram profile URL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'social_youtube',
                'value' => 'https://youtube.com/@ecomarcpunjabi',
                'type' => 'url',
                'description' => 'YouTube channel URL',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ];

        DB::table('settings')->insert($settings);
    }
}
