@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Admin Dashboard</h1>
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="display-6 fw-bold">{{ $userCount ?? '0' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Posts</h5>
                    <p class="display-6 fw-bold">{{ $postCount ?? '0' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm text-center bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Welcome</h5>
                    <p class="card-text">{{ Auth::user()->name }}, have a great day!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Sliders</h5>
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-primary">Sliders</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Safaris</h5>
                    <a href="{{ route('admin.safaris.index') }}" class="btn btn-primary">Safaris</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Destinations</h5>
                    <a href="{{ route('admin.destinations.index') }}" class="btn btn-primary">Destinations</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Testimonials</h5>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary">Testimonials</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Blog Posts</h5>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Blog Posts</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Users</h5>
                    <a href="{{ route('admin.manage-users') }}" class="btn btn-primary">Users</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
