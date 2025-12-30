<?php

namespace Database\Seeders;

use App\Models\ShippingCharge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shippingCharges = [
            // Free Shipping for orders above ₹2000
            [
                'name' => 'Free Shipping',
                'shipping_method' => 'standard',
                'state' => null,
                'city' => null,
                'pincode' => null,
                'min_weight' => null,
                'max_weight' => null,
                'min_order_value' => 2000.00,
                'max_order_value' => null,
                'charge' => 0.00,
                'free_shipping_threshold' => 2000.00,
                'estimated_days' => 5,
                'description' => 'Free shipping for orders above ₹2000',
                'is_active' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Standard Shipping - All India
            [
                'name' => 'Standard Shipping - All India',
                'shipping_method' => 'standard',
                'state' => null,
                'city' => null,
                'pincode' => null,
                'min_weight' => null,
                'max_weight' => 2.00,
                'min_order_value' => null,
                'max_order_value' => 1999.99,
                'charge' => 100.00,
                'free_shipping_threshold' => null,
                'estimated_days' => 5,
                'description' => 'Standard shipping for orders below ₹2000',
                'is_active' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Standard Shipping - Heavy Items (above 2kg)
            [
                'name' => 'Standard Shipping - Heavy Items',
                'shipping_method' => 'standard',
                'state' => null,
                'city' => null,
                'pincode' => null,
                'min_weight' => 2.01,
                'max_weight' => 5.00,
                'min_order_value' => null,
                'max_order_value' => 1999.99,
                'charge' => 150.00,
                'free_shipping_threshold' => null,
                'estimated_days' => 5,
                'description' => 'Standard shipping for heavy items (2-5kg)',
                'is_active' => true,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Express Shipping
            [
                'name' => 'Express Shipping',
                'shipping_method' => 'express',
                'state' => null,
                'city' => null,
                'pincode' => null,
                'min_weight' => null,
                'max_weight' => null,
                'min_order_value' => null,
                'max_order_value' => null,
                'charge' => 200.00,
                'free_shipping_threshold' => null,
                'estimated_days' => 2,
                'description' => 'Express shipping - 2 days delivery',
                'is_active' => true,
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Punjab State - Lower Charges
            [
                'name' => 'Punjab State Shipping',
                'shipping_method' => 'standard',
                'state' => 'Punjab',
                'city' => null,
                'pincode' => null,
                'min_weight' => null,
                'max_weight' => null,
                'min_order_value' => null,
                'max_order_value' => 1999.99,
                'charge' => 50.00,
                'free_shipping_threshold' => null,
                'estimated_days' => 3,
                'description' => 'Reduced shipping charges for Punjab',
                'is_active' => true,
                'sort_order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Amritsar City - Free Shipping
            [
                'name' => 'Amritsar City - Free Shipping',
                'shipping_method' => 'standard',
                'state' => 'Punjab',
                'city' => 'Amritsar',
                'pincode' => null,
                'min_weight' => null,
                'max_weight' => null,
                'min_order_value' => null,
                'max_order_value' => null,
                'charge' => 0.00,
                'free_shipping_threshold' => null,
                'estimated_days' => 1,
                'description' => 'Free shipping for Amritsar city',
                'is_active' => true,
                'sort_order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Cash on Delivery Charges
            [
                'name' => 'Cash on Delivery Charges',
                'shipping_method' => 'standard',
                'state' => null,
                'city' => null,
                'pincode' => null,
                'min_weight' => null,
                'max_weight' => null,
                'min_order_value' => null,
                'max_order_value' => null,
                'charge' => 50.00,
                'free_shipping_threshold' => null,
                'estimated_days' => 5,
                'description' => 'Additional charges for cash on delivery',
                'is_active' => true,
                'sort_order' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        ShippingCharge::insert($shippingCharges);
    }
}
