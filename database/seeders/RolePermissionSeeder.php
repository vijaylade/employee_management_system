<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Find or create the admin role
          $adminRole = Role::findOrCreate('admin', 'web');

        //   // Assign permissions to the admin role
          $adminRole->syncPermissions([
              'manage employees',
              'manage employee leaves',
              'monthly salary slip',
              'manage employee status',
              'view events',
          ]);

           // Find or create the employee role
        $employeeRole = Role::findOrCreate('employee', 'web');

        // Assign permissions to the employee role
        $employeeRole->syncPermissions([
            'my leaves',
            'monthly salary slip',
            'add employee status',
            'view events',
        ]);
    }
}
