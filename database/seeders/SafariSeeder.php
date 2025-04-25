<?php

namespace Database\Seeders;

use App\Models\Safari;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SafariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Safari::create([
            'name' => 'Majestic Gorilla Trekking',
            'slug' => Str::slug('Majestic Gorilla Trekking'),
            'description' => "Embark on a life-changing journey into the heart of the Virunga Mountains or Bwindi Impenetrable Forest. Witness families of endangered mountain gorillas in their natural habitat. An experience unlike any other.\n\nIncludes permits, expert guides, and accommodation.",
            // 'image_path' => 'safari_images/gorilla_trek.jpg', // Example path - requires image upload setup
        ]);

        Safari::create([
            'name' => 'Rwanda Primate Paradise',
            'slug' => Str::slug('Rwanda Primate Paradise'),
            'description' => "Explore the land of a thousand hills. Track gorillas in Volcanoes National Park, search for chimpanzees in Nyungwe Forest, and relax by the shores of Lake Kivu. Discover Rwanda's rich culture and stunning landscapes.",
            // 'image_path' => 'safari_images/rwanda_primates.jpg',
        ]);

        Safari::create([
            'name' => "Congo's Untamed Wilderness",
            'slug' => Str::slug('Congo Untamed Wilderness'),
            'description' => 'Venture into the less-explored wilderness of the Congo Basin. Experience unique wildlife encounters, including lowland gorillas and forest elephants, in Odzala-Kokoua National Park. For the truly adventurous spirit.',
            // 'image_path' => 'safari_images/congo_wilderness.jpg',
        ]);

        Safari::create([
            'name' => "Uganda's Pearl of Africa",
            'slug' => Str::slug('Uganda Pearl of Africa'),
            'description' => 'Discover the diverse wonders of Uganda. From gorilla trekking in Bwindi to chimpanzee tracking in Kibale, boat safaris on the Nile in Murchison Falls, and classic game drives in Queen Elizabeth National Park.',
            // 'image_path' => 'safari_images/uganda_pearl.jpg',
        ]);

        Safari::create([
            'name' => 'East Africa Explorer (Multi-Country)',
            'slug' => Str::slug('East Africa Explorer Multi-Country'),
            'description' => 'Combine the highlights of Kenya, Tanzania, and Uganda or Rwanda. Witness the Great Migration, trek for gorillas, and explore diverse landscapes and cultures in one comprehensive safari adventure.',
            // 'image_path' => 'safari_images/east_africa_explorer.jpg',
        ]);
    }
}
