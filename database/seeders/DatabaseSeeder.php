<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Admin',
    //         'no_hp' => '081234567890',
    //         'password' => Hash::make('admin123'), // Ganti sesuai kebutuhan
    //         'role' => 'admin',
    //     ]);
    // }
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
