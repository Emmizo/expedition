<x-app-layout>
    {{-- Hero Section Carousel --}}
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        {{-- Indicators --}}
        @if($sliders->count() > 1)
        <div class="carousel-indicators">
            @foreach($sliders as $index => $slider)
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        @endif

        {{-- Slides --}}
        <div class="carousel-inner">
            @forelse($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="carousel-fullscreen-item">
                        {{-- Assuming slider model has image_path, title, description, button_text, button_link --}}
                        <div class="carousel-background" style="background-image: url('{{ asset("storage/" . $slider->image_path) }}');"></div>
                        <div class="carousel-overlay"></div>
                        <div class="carousel-content">
                            <div class="container text-light">
                                <div class="row justify-content-center text-center">
                                    <div class="col-lg-8">
                                        <h1 class="display-4 fw-bold mb-3">{{ $slider->title }}</h1>
                                        <p class="lead mb-4">{{ $slider->description }}</p>
                                        @if($slider->button_link && $slider->button_text)
                                            <a class="btn btn-light btn-lg" href="{{ $slider->button_link }}" role="button">{{ $slider->button_text }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Fallback if no sliders --}}
                <div class="carousel-item active">
                    <div class="carousel-fullscreen-item">
                        <div class="carousel-background" style="background-image: url('{{ asset('images/freepik__expand-left-and-right-side__7766.png') }}');"></div>
                        <div class="carousel-overlay"></div>
                        <div class="carousel-content">
                            <div class="container text-light">
                                <div class="row justify-content-center text-center">
                                    <div class="col-lg-8">
                                        <h1 class="display-4 fw-bold mb-3">Welcome to Expediction</h1>
                                        <p class="lead mb-4">Your adventure starts here.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Controls --}}
         @if($sliders->count() > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div>


    {{-- Container for the rest of the page content - Apply background here --}}
    <div class="container-fluid px-0" style="background-color: #C4D1D4;">

        {{-- Safari Types Section --}}
        <section id="safaris" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5 text-dark">Explore Our Unique Safari Experiences</h2>
                <div class="row">
                    @if($featuredSafaris->count() > 0)
                        @foreach($featuredSafaris as $safari)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm bg-white border-light">
                                    {{-- Wrap image in container and apply classes --}}
                                    <div class="safari-image-container">
                                        <a href="{{ route('safaris.show', $safari->slug) }}">
                                            @if($safari->image_path && file_exists(public_path('storage/' . $safari->image_path)))
                                                <img src="{{ asset('storage/' . $safari->image_path) }}" class="safari-image" alt="{{ $safari->name }}">
                                            @else
                                                <img src="{{ asset('images/freepik__expand-left-and-right-side__7766-1024x585.png') }}" class="safari-image" alt="{{ $safari->name }}">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $safari->name }}</h5>
                                        <p class="card-text flex-grow-1">{{ Str::limit($safari->description, 100) }}</p>
                                        <a href="{{ route('safaris.show', $safari->slug) }}" class="btn btn-primary mt-auto align-self-start">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p class="text-center text-dark opacity-75">No featured safaris available at the moment.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        {{-- Popular Destinations Carousel --}}
        <section id="destinations" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5 text-dark">Popular Destinations</h2>
                @if($popularDestinations->count() > 0)
                    <div id="destinationsCarousel" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-inner">
                             @foreach($popularDestinations as $destination)
                                {{-- Assuming destination model has name, description, image_path, slug/link --}}
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8 col-lg-6 col-xl-4">
                                            <div class="card h-100 shadow-sm bg-white border-light">
                                                <img src="{{ asset('storage/' . $destination->image_path) }}" class="card-img-top" alt="{{ $destination->name }}" style="height: 200px; object-fit: cover;">
                                                <div class="card-body d-flex flex-column text-center">
                                                    <h5 class="card-title">{{ $destination->name }}</h5>
                                                    <p class="card-text flex-grow-1">{{ Str::limit($destination->description, 100) }}</p>
                                                    {{-- Assuming a route like 'destinations.show' exists --}}
                                                    <a href="{{-- route('destinations.show', $destination->slug) --}}" class="btn btn-primary mt-2 align-self-center">Discover {{ $destination->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- Controls --}}
                         @if($popularDestinations->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#destinationsCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%;" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#destinationsCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%;" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                @else
                    <p class="text-center text-dark opacity-75">Popular destinations coming soon.</p>
                @endif
            </div>
        </section>

        {{-- "Why Choose Us?" Section --}}
        @php
            $whyChooseUsItems = \App\Models\WhyChooseUs::all();
        @endphp
        <section id="why-choose-us" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5 text-dark">Why Choose Us?</h2>
                <div class="row">
                    @forelse($whyChooseUsItems as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm bg-white border-light text-center">
                                @if($item->icon)
                                    <div class="mt-3 mb-2">
                                        <i class="{{ $item->icon }} fa-2x"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-dark opacity-75">No reasons added yet.</p>
                    @endforelse
                </div>
            </div>
        </section>

        {{-- Testimonials Section --}}
        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-5 text-dark">What Our Adventurers Say</h2>
                 @if($testimonials->count() > 0)
                    <div class="row">
                        @foreach($testimonials as $testimonial)
                             {{-- Assuming testimonial model has quote, author --}}
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm bg-white border border-light">
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>"{{ $testimonial->quote }}"</p>
                                            <footer class="blockquote-footer mt-2">{{ $testimonial->author }}</footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                     <p class="text-center text-dark opacity-75">No testimonials yet.</p>
                @endif
            </div>
          </section>

         {{-- Contact Section --}}
         @php
            $contact_email = \App\Models\Setting::where('key', 'contact_email')->value('value');
            $contact_phone = \App\Models\Setting::where('key', 'contact_phone')->value('value');
            $contact_address = \App\Models\Setting::where('key', 'contact_address')->value('value');
         @endphp
         <section id="contact" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5 text-dark">Contact Us</h2>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <ul class="list-group">
                            @if($contact_email)
                                <li class="list-group-item"><strong>Email:</strong> {{ $contact_email }}</li>
                            @endif
                            @if($contact_phone)
                                <li class="list-group-item"><strong>Phone:</strong> {{ $contact_phone }}</li>
                            @endif
                            @if($contact_address)
                                <li class="list-group-item"><strong>Address:</strong> {{ $contact_address }}</li>
            @endif
                    </ul>
                    </div>
                </div>
            </div>
        </section>

        {{-- Latest Blog Posts Section --}}
        <section id="latest-posts" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5 text-dark">Latest Blog Posts</h2>
                <div class="row">
                    @forelse($latestPosts as $post)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm bg-white border-light">
                                @if($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text flex-grow-1">{{ $post->excerpt ?: Str::limit(strip_tags($post->body), 100) }}</p>
                                    <p class="card-text"><small class="text-muted">By {{ $post->user->name ?? 'N/A' }} | {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}</small></p>
                                    <a href="{{ route('blog.show', $post) }}" class="btn btn-outline-primary mt-auto">Read More</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center text-dark opacity-75">No blog posts published yet.</p>
                        </div>
                    @endforelse
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('blog.index') }}" class="btn btn-primary">View All Blog Posts</a>
                </div>
            </div>
        </section>
        </div>

</x-app-layout>
