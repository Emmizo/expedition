@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center mb-4">
    <i class="bi bi-speedometer2 display-5 me-3 text-primary"></i>
    <h1 class="h3 fw-bold mb-0">Dashboard</h1>
</div>
<div class="row g-4 mb-4">
    <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="bg-primary text-white rounded-circle p-3 me-3"><i class="bi bi-people fs-3"></i></div>
                <div>
                    <div class="fw-bold fs-4">{{ $userCount ?? '0' }}</div>
                    <div class="text-muted small">Users</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="bg-success text-white rounded-circle p-3 me-3"><i class="bi bi-journal-text fs-3"></i></div>
                <div>
                    <div class="fw-bold fs-4">{{ $postCount ?? '0' }}</div>
                    <div class="text-muted small">Posts</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="bg-warning text-white rounded-circle p-3 me-3"><i class="bi bi-briefcase fs-3"></i></div>
                <div>
                    <div class="fw-bold fs-4">{{ \App\Models\Service::count() }}</div>
                    <div class="text-muted small">Services</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="bg-info text-white rounded-circle p-3 me-3"><i class="bi bi-person-badge fs-3"></i></div>
                <div>
                    <div class="fw-bold fs-4">{{ \App\Models\TeamMember::count() }}</div>
                    <div class="text-muted small">Team Members</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row g-4 mb-4">
    <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="bg-secondary text-white rounded-circle p-3 me-3"><i class="bi bi-chat-quote fs-3"></i></div>
                <div>
                    <div class="fw-bold fs-4">{{ \App\Models\Testimonial::count() }}</div>
                    <div class="text-muted small">Testimonials</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="bg-danger text-white rounded-circle p-3 me-3"><i class="bi bi-images fs-3"></i></div>
                <div>
                    <div class="fw-bold fs-4">{{ \App\Models\Slider::count() }}</div>
                    <div class="text-muted small">Sliders</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="bg-primary text-white rounded-circle p-3 me-3"><i class="bi bi-binoculars fs-3"></i></div>
                <div>
                    <div class="fw-bold fs-4">{{ \App\Models\Safari::count() }}</div>
                    <div class="text-muted small">Safaris</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="bg-success text-white rounded-circle p-3 me-3"><i class="bi bi-geo-alt fs-3"></i></div>
                <div>
                    <div class="fw-bold fs-4">{{ \App\Models\Destination::count() }}</div>
                    <div class="text-muted small">Destinations</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Quick Actions</h5>
        <div class="d-flex flex-wrap gap-3">
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-danger"><i class="bi bi-images me-1"></i> Manage Sliders</a>
            <a href="{{ route('admin.safaris.index') }}" class="btn btn-outline-primary"><i class="bi bi-binoculars me-1"></i> Manage Safaris</a>
            <a href="{{ route('admin.destinations.index') }}" class="btn btn-outline-success"><i class="bi bi-geo-alt me-1"></i> Manage Destinations</a>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary"><i class="bi bi-chat-quote me-1"></i> Manage Testimonials</a>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-info"><i class="bi bi-journal-text me-1"></i> Manage Blog Posts</a>
            <a href="{{ route('manage-users') }}" class="btn btn-outline-dark"><i class="bi bi-people me-1"></i> Manage Users</a>
        </div>
    </div>
</div>
<div class="alert alert-primary border-0 shadow-sm">
    <i class="bi bi-person-circle me-2"></i> Welcome, <strong>{{ Auth::user()->name }}</strong>! Use the sidebar and quick actions to manage your site.
</div>
@endsection
