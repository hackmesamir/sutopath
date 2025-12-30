<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Super Admin',
                'email' => 'admin@ecomarcpunjabi.com',
                'password' => Hash::make('password123'),
                'phone' => '+91 9876543210',
                'role' => 'super_admin',
                'status' => 'active',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin2@ecomarcpunjabi.com',
                'password' => Hash::make('password123'),
                'phone' => '+91 9876543211',
                'role' => 'admin',
                'status' => 'active',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@ecomarcpunjabi.com',
                'password' => Hash::make('password123'),
                'phone' => '+91 9876543212',
                'role' => 'manager',
                'status' => 'active',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Admin::insert($admins);
    }
}
