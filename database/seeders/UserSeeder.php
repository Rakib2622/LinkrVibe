<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

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
            'role' => 'admin'
        ]);

        $user = User::create([
            'name' =>'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'user'
        ]);
    }
}
