<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some products for relationships
        $products = Product::limit(3)->get();

        $campaigns = [
            [
                'name' => 'New Year Sale - 30% Off',
                'code' => 'NEWYEAR30',
                'description' => 'Get 30% off on all products. Limited time offer!',
                'discount_type' => 'percentage',
                'discount_value' => 30,
                'max_discount_amount' => 5000,
                'min_order_amount' => 1000,
                'applicable_to' => 'all_products',
                'usage_limit' => 1000,
                'usage_limit_per_user' => 1,
                'used_count' => 0,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
                'is_active' => true,
                'is_first_order_only' => false,
                'is_new_user_only' => false,
                'terms_conditions' => 'Valid on orders above ₹1000. Maximum discount ₹5000. One use per customer.',
                'banner_image' => 'campaigns/new-year-sale.jpg',
                'settings' => [
                    'highlight_color' => '#DC2626',
                    'text_color' => '#FFFFFF',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Women\'s Collection - 25% Off',
                'code' => 'WOMEN25',
                'description' => 'Special discount on women\'s wear collection',
                'discount_type' => 'percentage',
                'discount_value' => 25,
                'max_discount_amount' => 3000,
                'min_order_amount' => 500,
                'applicable_to' => 'all_products',
                'usage_limit' => 500,
                'usage_limit_per_user' => 2,
                'used_count' => 0,
                'start_date' => now(),
                'end_date' => now()->addDays(15),
                'is_active' => true,
                'is_first_order_only' => false,
                'is_new_user_only' => false,
                'terms_conditions' => 'Valid on all products. Maximum discount ₹3000.',
                'banner_image' => 'campaigns/womens-sale.jpg',
                'settings' => [
                    'highlight_color' => '#EC4899',
                    'text_color' => '#FFFFFF',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Flat ₹500 Off',
                'code' => 'FLAT500',
                'description' => 'Get flat ₹500 discount on orders above ₹2000',
                'discount_type' => 'fixed_amount',
                'discount_value' => 500,
                'max_discount_amount' => null,
                'min_order_amount' => 2000,
                'applicable_to' => 'all_products',
                'usage_limit' => 200,
                'usage_limit_per_user' => 1,
                'used_count' => 0,
                'start_date' => now(),
                'end_date' => now()->addDays(7),
                'is_active' => true,
                'is_first_order_only' => false,
                'is_new_user_only' => false,
                'terms_conditions' => 'Valid on orders above ₹2000. Limited to first 200 customers.',
                'banner_image' => 'campaigns/flat-500-off.jpg',
                'settings' => [
                    'highlight_color' => '#16A34A',
                    'text_color' => '#FFFFFF',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Free Shipping',
                'code' => 'FREESHIP',
                'description' => 'Free shipping on all orders',
                'discount_type' => 'free_shipping',
                'discount_value' => null,
                'max_discount_amount' => null,
                'min_order_amount' => 0,
                'applicable_to' => 'all_products',
                'usage_limit' => null,
                'usage_limit_per_user' => null,
                'used_count' => 0,
                'start_date' => now(),
                'end_date' => now()->addDays(60),
                'is_active' => true,
                'is_first_order_only' => false,
                'is_new_user_only' => false,
                'terms_conditions' => 'Free shipping on all orders. No minimum order value required.',
                'banner_image' => 'campaigns/free-shipping.jpg',
                'settings' => [
                    'highlight_color' => '#3B82F6',
                    'text_color' => '#FFFFFF',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'New Customer Special - 20% Off',
                'code' => 'NEWCUSTOMER20',
                'description' => 'Welcome offer for new customers',
                'discount_type' => 'percentage',
                'discount_value' => 20,
                'max_discount_amount' => 2000,
                'min_order_amount' => 500,
                'applicable_to' => 'all_products',
                'usage_limit' => null,
                'usage_limit_per_user' => 1,
                'used_count' => 0,
                'start_date' => now(),
                'end_date' => now()->addDays(90),
                'is_active' => true,
                'is_first_order_only' => true,
                'is_new_user_only' => true,
                'terms_conditions' => 'Valid only for new customers on their first order. Maximum discount ₹2000.',
                'banner_image' => 'campaigns/new-customer.jpg',
                'settings' => [
                    'highlight_color' => '#F59E0B',
                    'text_color' => '#FFFFFF',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Selected Products - 15% Off',
                'code' => 'SELECT15',
                'description' => 'Discount on selected products',
                'discount_type' => 'percentage',
                'discount_value' => 15,
                'max_discount_amount' => 1500,
                'min_order_amount' => 300,
                'applicable_to' => 'specific_products',
                'usage_limit' => 300,
                'usage_limit_per_user' => 3,
                'used_count' => 0,
                'start_date' => now(),
                'end_date' => now()->addDays(20),
                'is_active' => true,
                'is_first_order_only' => false,
                'is_new_user_only' => false,
                'terms_conditions' => 'Valid only on selected products. Maximum discount ₹1500.',
                'banner_image' => 'campaigns/selected-products.jpg',
                'settings' => [
                    'highlight_color' => '#8B5CF6',
                    'text_color' => '#FFFFFF',
                ],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($campaigns as $campaignData) {
            $campaign = Campaign::create($campaignData);

            // Attach products for product-specific campaigns
            if ($campaign->applicable_to === 'specific_products' && $campaign->name === 'Selected Products - 15% Off') {
                if ($products->isNotEmpty()) {
                    $campaign->products()->attach($products->pluck('id')->toArray());
                }
            }
        }
    }
}
