<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'add-customers', 'guard_name' => 'api']);
        Permission::create(['name' => 'update-customers', 'guard_name' => 'api']);
        Permission::create(['name' => 'delete-customers', 'guard_name' => 'api']);
        Permission::create(['name' => 'add-items', 'guard_name' => 'api']);
        Permission::create(['name' => 'delete-items', 'guard_name' => 'api']);
        Permission::create(['name' => 'update-items', 'guard_name' => 'api']);

        $owner = Role::create(['name' => 'owner', 'guard_name' => 'api']);
        $cashier = Role::create(['name' => 'cashier', 'guard_name' => 'api']);
        $manager = Role::create(['name' => 'manager', 'guard_name' => 'api']);

        $owner->givePermissionTo('add-customers');
        $owner->givePermissionTo('update-customers');
        $owner->givePermissionTo('delete-customers');
        $owner->givePermissionTo('add-items');
        $owner->givePermissionTo('delete-items');
        $owner->givePermissionTo('update-items');

        $cashier->givePermissionTo('delete-items');
        $cashier->givePermissionTo('update-items');

        $manager->givePermissionTo('update-customers');
        $manager->givePermissionTo('delete-customers');
    }
}
