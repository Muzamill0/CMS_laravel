<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create permissions
        $permissions = [
            'create user',
            'edit user',
            'delete user',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $role = Role::create([
            'name' => 'Admin',
    ]);
        $role->syncPermissions($permissions);

        $role = Role::create([
            'name' => 'Employee'
        ]);
        $role->syncPermissions([
            'create user',
            'edit user',
        ]);

    }
}
