<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@linkrvibe.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
            'phone' => '1234567890',
            'address' => '123 Admin Street, City, Country',
            'profile_picture' => 'default_admin.png', // Path to default profile picture
            'currency' => 'EUR',
            'is_active' => true,
            'preferences' => json_encode(['theme' => 'dark', 'notifications' => true]), // Example preferences
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'user',
            'phone' => '0987654321',
            'address' => '456 User Lane, Town, Country',
            'profile_picture' => 'default_user.png', // Path to default profile picture
            'currency' => 'EUR',
            'is_active' => true,
            'preferences' => json_encode(['theme' => 'light', 'notifications' => false]), // Example preferences
        ]);
    }
}
