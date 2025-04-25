<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $safari->name }}
        </h2>
    </x-slot>

    {{-- Wrap content in a contrasting container --}}
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 sm:p-8">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        {{-- Display Safari Image using custom classes --}}
                        <div class="safari-image-container mb-4"> {{-- Added container and margin --}}
                            @if($safari->image_path && file_exists(public_path('storage/' . $safari->image_path)))
                                <img src="{{ asset('storage/' . $safari->image_path) }}" alt="{{ $safari->name }}" class="safari-image rounded"> {{-- Added class, removed img-fluid --}}
                            @else
                                 <img src="https://via.placeholder.com/700x400?text={{ urlencode($safari->name) }}" alt="{{ $safari->name }}" class="safari-image rounded"> {{-- Added class, removed img-fluid --}}
                            @endif
                        </div>

                        <h1 class="mb-4">{{ $safari->name }}</h1>
                        <hr class="my-4">
                        <div class="lead safari-description">
                             {!! nl2br(e($safari->description)) !!} {{-- Use nl2br to respect line breaks, escape content --}}
                        </div>

                        {{-- Add more details like itinerary, map, booking form etc. later --}}

                        <div class="mt-5 d-flex justify-content-between"> {{-- Use flexbox for button alignment --}}
                            <a href="{{ route('home') }}/#safaris" class="btn btn-outline-secondary">&laquo; Back to Safaris Overview</a>
                            <a href="{{ route('contact') }}?subject=Inquiry about {{ urlencode($safari->name) }}" class="btn btn-primary">Inquire Now</a> {{-- Removed float-end --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Include common sections from homepage --}}
    <div class="container-fluid px-0" style="background-color: #C4D1D4;"> {{-- Need the background color here --}}
        @include('partials.why-choose-us')
        @include('partials.testimonials')
        @include('partials.cta-contact')
    </div>

</x-app-layout>
