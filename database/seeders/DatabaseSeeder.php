<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the seeders
        $this->call([
            RolePermissionSeeder::class,
            SafariSeeder::class,
            PostSeeder::class,
        ]);

        // User::factory(10)->create();

        // Create or find the default admin user and assign the admin role
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@expediction.test'],  // Find by email
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),  // Need to set password if creating
            ]
        );
        $adminUser->assignRole('admin');

        // Create or find the default regular user
        $regularUser = User::firstOrCreate(
            ['email' => 'user@expediction.test'],
            [
                'name' => 'Regular User',
                'password' => bcrypt('password'),
            ]
        );
        $regularUser->assignRole('user');

        // Remove the default test user created by Breeze if not needed
        // User::where('email', 'test@example.com')->delete();
    }
}
