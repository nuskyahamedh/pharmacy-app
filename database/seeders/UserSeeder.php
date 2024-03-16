<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Cashie User',
            'email' => 'cashier@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
