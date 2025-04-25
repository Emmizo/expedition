<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    {{-- Wrap content in a contrasting container --}}
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 sm:p-8">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h1 class="mb-4">About Expediction</h1>
                        <p class="lead">Welcome to Expediction, your premier partner for unforgettable safari adventures across East Africa.</p>
                        <hr class="my-4">
                        <p>Founded by passionate explorers with decades of experience, Expediction was born from a desire to share the magic of Africa's wilderness and diverse cultures with the world, responsibly and authentically.</p>
                        <p>Our mission is to craft unique, personalized journeys that go beyond the ordinary. We believe in:</p>
                        <ul>
                            <li><strong>Authentic Experiences:</strong> Connecting you with local cultures and pristine natural environments.</li>
                            <li><strong>Expert Guidance:</strong> Utilizing knowledgeable local guides who ensure your safety and enrich your understanding.</li>
                            <li><strong>Sustainable Travel:</strong> Committing to practices that conserve wildlife and support local communities.</li>
                            <li><strong>Personalized Service:</strong> Tailoring every itinerary to your interests, budget, and travel style.</li>
                        </ul>
                        <p>From tracking gorillas in the misty mountains of Rwanda and Uganda to witnessing the great migration in Kenya or Tanzania, or exploring the unique landscapes of Congo, we are dedicated to making your safari dream a reality.</p>
                        <p>Join us for an adventure of a lifetime.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
