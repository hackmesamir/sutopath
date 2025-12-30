<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed settings, admins, categories, sizes, colors, shipping charges, products, product images, banners, and campaigns
        $this->call([
            SettingsSeeder::class,
            AdminSeeder::class,
            CategorySeeder::class,
            SizeSeeder::class,
            ColorSeeder::class,
            ShippingChargeSeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
            BannerSeeder::class,
            CampaignSeeder::class,
        ]);
    }
}
