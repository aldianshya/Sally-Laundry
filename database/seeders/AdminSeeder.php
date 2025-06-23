<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'no_hp' => '081234567890',
            'password' => Hash::make('admin123'), // Ganti sesuai kebutuhan
            'role' => 'admin',
        ]);
    }
}

