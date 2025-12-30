<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get products
        $products = Product::all();

        foreach ($products as $index => $product) {
            $productImages = [];

            // Traditional Punjabi Suit
            if ($product->slug === 'traditional-punjabi-suit') {
                $productImages = [
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/punjabi-suit-1.jpg',
                        'alt_text' => 'Traditional Punjabi Suit - Front View',
                        'title' => 'Traditional Punjabi Suit',
                        'is_primary' => true,
                        'sort_order' => 1,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/punjabi-suit-1-1.jpg',
                        'alt_text' => 'Traditional Punjabi Suit - Side View',
                        'title' => 'Traditional Punjabi Suit Side View',
                        'is_primary' => false,
                        'sort_order' => 2,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/punjabi-suit-1-2.jpg',
                        'alt_text' => 'Traditional Punjabi Suit - Detail View',
                        'title' => 'Traditional Punjabi Suit Detail',
                        'is_primary' => false,
                        'sort_order' => 3,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ];
            }
            // Designer Patiala Suit
            elseif ($product->slug === 'designer-patiala-suit') {
                $productImages = [
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/patiala-suit-1.jpg',
                        'alt_text' => 'Designer Patiala Suit - Front View',
                        'title' => 'Designer Patiala Suit',
                        'is_primary' => true,
                        'sort_order' => 1,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/patiala-suit-1-1.jpg',
                        'alt_text' => 'Designer Patiala Suit - Back View',
                        'title' => 'Designer Patiala Suit Back View',
                        'is_primary' => false,
                        'sort_order' => 2,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/patiala-suit-1-2.jpg',
                        'alt_text' => 'Designer Patiala Suit - Detail',
                        'title' => 'Designer Patiala Suit Detail',
                        'is_primary' => false,
                        'sort_order' => 3,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ];
            }
            // Punjabi Dupatta
            elseif ($product->slug === 'punjabi-dupatta') {
                $productImages = [
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/dupatta-1.jpg',
                        'alt_text' => 'Punjabi Dupatta',
                        'title' => 'Punjabi Dupatta',
                        'is_primary' => true,
                        'sort_order' => 1,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/dupatta-1-1.jpg',
                        'alt_text' => 'Punjabi Dupatta - Detail',
                        'title' => 'Punjabi Dupatta Detail',
                        'is_primary' => false,
                        'sort_order' => 2,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ];
            }
            // Men's Kurta Pajama
            elseif ($product->slug === 'mens-kurta-pajama') {
                $productImages = [
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/kurta-pajama-1.jpg',
                        'alt_text' => "Men's Kurta Pajama",
                        'title' => "Men's Kurta Pajama",
                        'is_primary' => true,
                        'sort_order' => 1,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/kurta-pajama-1-1.jpg',
                        'alt_text' => "Men's Kurta Pajama - Side View",
                        'title' => "Men's Kurta Pajama Side View",
                        'is_primary' => false,
                        'sort_order' => 2,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/kurta-pajama-1-2.jpg',
                        'alt_text' => "Men's Kurta Pajama - Detail",
                        'title' => "Men's Kurta Pajama Detail",
                        'is_primary' => false,
                        'sort_order' => 3,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ];
            }
            // Kids Punjabi Suit
            elseif ($product->slug === 'kids-punjabi-suit') {
                $productImages = [
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/kids-suit-1.jpg',
                        'alt_text' => 'Kids Punjabi Suit',
                        'title' => 'Kids Punjabi Suit',
                        'is_primary' => true,
                        'sort_order' => 1,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/kids-suit-1-1.jpg',
                        'alt_text' => 'Kids Punjabi Suit - Detail',
                        'title' => 'Kids Punjabi Suit Detail',
                        'is_primary' => false,
                        'sort_order' => 2,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ];
            }
            // Default images for other products
            else {
                $productImages = [
                    [
                        'product_id' => $product->id,
                        'image_path' => 'products/default-product.jpg',
                        'alt_text' => $product->name,
                        'title' => $product->name,
                        'is_primary' => true,
                        'sort_order' => 1,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ];
            }

            if (!empty($productImages)) {
                ProductImage::insert($productImages);
            }
        }
    }
}
