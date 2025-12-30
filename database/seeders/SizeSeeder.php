<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            [
                'name' => 'Extra Small',
                'code' => 'XS',
                'description' => 'Extra Small size',
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Small',
                'code' => 'S',
                'description' => 'Small size',
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Medium',
                'code' => 'M',
                'description' => 'Medium size',
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Large',
                'code' => 'L',
                'description' => 'Large size',
                'sort_order' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Extra Large',
                'code' => 'XL',
                'description' => 'Extra Large size',
                'sort_order' => 5,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Double Extra Large',
                'code' => 'XXL',
                'description' => 'Double Extra Large size',
                'sort_order' => 6,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Triple Extra Large',
                'code' => 'XXXL',
                'description' => 'Triple Extra Large size',
                'sort_order' => 7,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Kids Sizes
            [
                'name' => '2-3 Years',
                'code' => '2-3Y',
                'description' => 'Size for 2-3 years old',
                'sort_order' => 10,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '4-5 Years',
                'code' => '4-5Y',
                'description' => 'Size for 4-5 years old',
                'sort_order' => 11,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '6-7 Years',
                'code' => '6-7Y',
                'description' => 'Size for 6-7 years old',
                'sort_order' => 12,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '8-9 Years',
                'code' => '8-9Y',
                'description' => 'Size for 8-9 years old',
                'sort_order' => 13,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '10-12 Years',
                'code' => '10-12Y',
                'description' => 'Size for 10-12 years old',
                'sort_order' => 14,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // One Size
            [
                'name' => 'One Size',
                'code' => 'OS',
                'description' => 'One size fits all',
                'sort_order' => 20,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Size::insert($sizes);
    }
}
