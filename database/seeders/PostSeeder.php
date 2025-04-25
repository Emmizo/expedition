<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find or create the admin user to be the author
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@expediction.test'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );
        // Ensure role is assigned if newly created (might be redundant if DatabaseSeeder runs first)
        if (!$adminUser->hasRole('admin')) {
            $adminUser->assignRole('admin');
        }

        Post::firstOrCreate(
            ['slug' => Str::slug('Preparing for Your Gorilla Trekking Adventure')],
            [
                'user_id' => $adminUser->id,
                'title' => 'Preparing for Your Gorilla Trekking Adventure',
                'excerpt' => 'Essential tips and gear recommendations for an unforgettable gorilla trekking experience in Africa.',
                'body' => "Gorilla trekking is a bucket-list experience, but proper preparation is key. Here\'s what you need to know:\n\n**Fitness:** Be prepared for hiking on steep, muddy terrain.\n**Gear:** Pack sturdy hiking boots, rain gear, layers, gloves, and insect repellent.\n**Permits:** Book your permits well in advance as they are limited.\n**Respect:** Follow your guide\'s instructions and maintain a safe distance from the gorillas.",
                'published_at' => now(),
            ]
        );

        Post::firstOrCreate(
            ['slug' => Str::slug('Why Rwanda Should Be Your Next Safari Destination')],
            [
                'user_id' => $adminUser->id,
                'title' => 'Why Rwanda Should Be Your Next Safari Destination',
                'excerpt' => 'Discover the beauty, resilience, and diverse wildlife of the Land of a Thousand Hills.',
                'body' => "Rwanda offers more than just gorillas. Explore Nyungwe Forest for chimpanzees and canopy walks, visit Akagera National Park for classic savanna safaris, and experience the vibrant culture of Kigali. Rwanda\'s commitment to conservation and community makes it a truly special destination.",
                'published_at' => now(),
            ]
        );

        // Add more posts...
    }
}
