<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            [
                'name' => 'Red',
                'code' => 'RED',
                'hex_code' => '#FF0000',
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blue',
                'code' => 'BLUE',
                'hex_code' => '#0000FF',
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Green',
                'code' => 'GREEN',
                'hex_code' => '#008000',
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yellow',
                'code' => 'YELLOW',
                'hex_code' => '#FFFF00',
                'sort_order' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Orange',
                'code' => 'ORANGE',
                'hex_code' => '#FFA500',
                'sort_order' => 5,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pink',
                'code' => 'PINK',
                'hex_code' => '#FFC0CB',
                'sort_order' => 6,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Purple',
                'code' => 'PURPLE',
                'hex_code' => '#800080',
                'sort_order' => 7,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Black',
                'code' => 'BLACK',
                'hex_code' => '#000000',
                'sort_order' => 8,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'White',
                'code' => 'WHITE',
                'hex_code' => '#FFFFFF',
                'sort_order' => 9,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grey',
                'code' => 'GREY',
                'hex_code' => '#808080',
                'sort_order' => 10,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Brown',
                'code' => 'BROWN',
                'hex_code' => '#A52A2A',
                'sort_order' => 11,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beige',
                'code' => 'BEIGE',
                'hex_code' => '#F5F5DC',
                'sort_order' => 12,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Navy Blue',
                'code' => 'NAVY',
                'hex_code' => '#000080',
                'sort_order' => 13,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maroon',
                'code' => 'MAROON',
                'hex_code' => '#800000',
                'sort_order' => 14,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Peach',
                'code' => 'PEACH',
                'hex_code' => '#FFCBA4',
                'sort_order' => 15,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cream',
                'code' => 'CREAM',
                'hex_code' => '#FFFDD0',
                'sort_order' => 16,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gold',
                'code' => 'GOLD',
                'hex_code' => '#FFD700',
                'sort_order' => 17,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Silver',
                'code' => 'SILVER',
                'hex_code' => '#C0C0C0',
                'sort_order' => 18,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Color::insert($colors);
    }
}
