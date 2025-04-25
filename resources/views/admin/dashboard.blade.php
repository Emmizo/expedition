<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h3 class="text-lg font-medium mb-4">Content Management</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                {{-- Links to manage different content types --}}
                <a href="{{ route('admin.sliders.index') }}" class="block p-4 bg-gray-100 hover:bg-gray-200 rounded-lg text-center">
                    Manage Sliders
                </a>
                <a href="{{ route('admin.safaris.index') }}" class="block p-4 bg-gray-100 hover:bg-gray-200 rounded-lg text-center">
                    Manage Safaris
                </a>
                 <a href="{{ route('admin.destinations.index') }}" class="block p-4 bg-gray-100 hover:bg-gray-200 rounded-lg text-center">
                    Manage Destinations
                </a>
                 <a href="{{ route('admin.testimonials.index') }}" class="block p-4 bg-gray-100 hover:bg-gray-200 rounded-lg text-center">
                    Manage Testimonials
                </a>
                 <a href="{{ route('admin.posts.index') }}" class="block p-4 bg-gray-100 hover:bg-gray-200 rounded-lg text-center">
                    Manage Blog Posts
                </a>
                 <a href="{{ route('admin.manage-users') }}" class="block p-4 bg-gray-100 hover:bg-gray-200 rounded-lg text-center">
                    Manage Users
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
