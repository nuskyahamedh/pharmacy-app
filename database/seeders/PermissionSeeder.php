<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = User::where('email', 'admin@gmail.com')->first();
        $owner->assignRole('owner');

        $cashier = User::where('email', 'cashier@gmail.com')->first();
        $cashier->assignRole('cashier');

        $manager = User::where('email', 'manager@gmail.com')->first();
        $manager->assignRole('manager');
    }
}
