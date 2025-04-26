@extends('layouts.app')

@section('content')
<!-- Dynamic Slider -->
@if($sliders->count())
<section class="mb-0">
    <div id="homepageSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($sliders as $index => $slider)
                <button type="button" data-bs-target="#homepageSlider" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="d-flex align-items-center justify-content-center" style="min-height: 400px; background: #222;">
                        <img src="{{ asset('storage/' . $slider->image_path) }}" class="d-block w-100" style="object-fit:cover; max-height:400px; opacity:0.7;" alt="{{ $slider->title }}">
                        <div class="carousel-caption d-none d-md-block text-start">
                            <h2 class="fw-bold">{{ $slider->title }}</h2>
                            @if($slider->description)
                                <p class="lead">{{ $slider->description }}</p>
                            @endif
                            @if($slider->button_link && $slider->button_text)
                                <a href="{{ $slider->button_link }}" class="btn btn-warning btn-lg">{{ $slider->button_text }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($sliders->count() > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#homepageSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homepageSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        @endif
    </div>
</section>
@endif

<!-- Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-3">Driving <span class="text-warning">Ideas</span>,<br>Teamwork & <span class="text-warning">Future-Ready</span><br>Solutions</h1>
                <p class="lead mb-4">Tech areas, services, and solutions related to content and testing. Here are some words related to content and testing. Hindenburg's report includes a text confirming that the section of road shown in the video could accelerate a crossing vehicle to highway speeds with text messages from a former Nokia employee agreeing to confirm the facts.</p>
                <a href="#" class="btn btn-warning btn-lg">Enable Innovation</a>
            </div>
        </div>
    </div>
</section>

<!-- Info Bar -->
<section class="bg-light py-3 border-bottom">
    <div class="container text-center">
        <span class="fw-semibold">Here are some words related to content and testing:</span>
        <span class="text-muted">Hindenburg's report includes a text confirming that the section of road shown in the video could accelerate a crossing vehicle to highway speeds with text messages from a former Nokia employee agreeing to confirm the facts.</span>
        <a href="#" class="btn btn-outline-primary btn-sm ms-3">Let's Get Started</a>
    </div>
</section>

<!-- Why TechVerse -->
@if($whyChooseUsItems->count())
<section class="py-5 bg-primary text-white">
    <div class="container">
        <h2 class="text-center mb-4">Why TechVerse</h2>
        <div class="row text-center">
            @foreach($whyChooseUsItems as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 bg-primary text-white border-0 shadow-sm">
                        <div class="card-body">
                            @if($item->icon)
                                <div class="mb-3"><i class="{{ $item->icon }} fa-2x"></i></div>
                            @endif
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Info Bar 2 -->
<section class="bg-light py-4 border-top border-bottom">
    <div class="container text-center">
        <span class="fw-semibold">Tell us more about your needs.</span>
        <span class="text-muted ms-2">We're here to listen and provide the solutions that address your legal concerns.</span>
        <a href="#" class="btn btn-primary btn-sm ms-3">Inform us</a>
    </div>
</section>

<!-- About Us -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">ABOUT US</h2>
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <h5>What we Do</h5>
                <p>Education: We offer a range of educational programs, workshops, and online resources for individuals and businesses.</p>
                <p>Community Building: We foster vibrant and inclusive community in technology, startups, students, and workers with networking events, meet-ups, and collaborations.</p>
                <p>Advocacy and Awareness: We promote digital skills, entrepreneurship, and partnerships with industry stakeholders.</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <h5>Our Mission</h5>
                <p>Our mission is to democratize access to web technologies, empower individuals and businesses, and help Rwanda thrive in the digital era. We are committed to responsible innovation and sustainable growth, ensuring that no one is left behind as new opportunities are created.</p>
            </div>
            <div class="col-md-3">
                <h5>Our Vision</h5>
                <p>Our vision is to position Rwanda as a hub for world's innovation and digital excellence. We believe in the potential of Rwandan talent and strive to help them build confident, empowered communities where the next generation can build a more inclusive and innovative society.</p>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Testimonials -->
@if($testimonials->count())
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">What Our Clients Say</h2>
        <div class="row justify-content-center">
            @foreach($testimonials as $testimonial)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <blockquote class="blockquote mb-3">
                                <p class="mb-0">“{{ $testimonial->quote }}”</p>
                            </blockquote>
                            <footer class="blockquote-footer text-end">{{ $testimonial->author }}</footer>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Team/Profiles -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mb-4 mb-md-0">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Kwizera Emmanuel" class="rounded-circle mb-3" width="100" height="100">
                        <h5 class="fw-bold mb-1">Kwizera Emmanuel</h5>
                        <p class="text-muted mb-2">CEO</p>
                        <p class="mb-2">As it pertains to test-taking, a brain dump (or memory dump) is an effective way to bring information to the forefront of your mind before a test begins.</p>
                        <a href="#" class="text-primary"><i class="bi bi-linkedin"></i> Visit my LinkedIn profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <img src="https://randomuser.me/api/portraits/men/33.jpg" alt="Patrick Driver" class="rounded-circle mb-3" width="100" height="100">
                        <h5 class="fw-bold mb-1">Patrick Driver</h5>
                        <p class="text-muted mb-2">CTO</p>
                        <p class="mb-2">As it pertains to test-taking, a brain dump (or memory dump) is an effective way to bring information to the forefront of your mind before a test begins.</p>
                        <a href="#" class="text-primary"><i class="bi bi-linkedin"></i> Visit my LinkedIn profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Blog Posts -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Latest Blog Posts</h2>
        <div class="row">
            @forelse($latestPosts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm bg-white border-light">
                        @if($post->image_path)
                            <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text flex-grow-1">{!! $post->excerpt ? nl2br(e($post->excerpt)) : Str::limit(strip_tags($post->body), 100) !!}</p>
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

<!-- Contact Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Contact TechVerse</h2>
        <p class="text-center mb-5">Whether you're seeking information about visiting our Rwanda country and know more information about a good reason you can enjoy, we are for you.</p>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="How can we help?"></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="terms">
                        <label class="form-check-label" for="terms">
                            I understand and agree to the Terms & Conditions
                        </label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
