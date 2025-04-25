<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Create permissions (optional for now, can add specifics later like 'manage users', 'edit posts')
        // Permission::create(['name' => 'access dashboard']);

        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assign permissions to roles (optional for now)
        // $adminRole->givePermissionTo('access dashboard');

        // Can assign roles to existing users here if needed, e.g.:
        // $user = \App\Models\User::find(1); // Find user with ID 1
        // if ($user) {
        //     $user->assignRole('admin');
        // }
    }
}
