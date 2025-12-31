<?php

namespace Database\Seeders;

use App\Models\Customer;
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
        // Customer::factory(10)->create();

   

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
