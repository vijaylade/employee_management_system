<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'manage employees', 'guard_name' => 'web']);
        Permission::create(['name' => 'my leaves', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage employee leaves', 'guard_name' => 'web']);
        Permission::create(['name' => 'monthly salary slip', 'guard_name' => 'web']);
        Permission::create(['name' => 'add employee status', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage employee status', 'guard_name' => 'web']);
        Permission::create(['name' => 'view events', 'guard_name' => 'web']);
        Permission::create(['name' => 'permissions', 'guard_name' => 'web']);
        Permission::create(['name' => 'roles', 'guard_name' => 'web']);
    }
}
