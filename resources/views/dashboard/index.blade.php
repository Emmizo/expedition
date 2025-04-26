@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Why Choose Us</h5>
                    <p class="card-text">Manage the reasons/features that make your company unique.</p>
                    <a href="{{ route('why-choose-us.index') }}" class="btn btn-primary">Manage Why Choose Us</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Settings</h5>
                    <p class="card-text">Manage site-wide settings and contact information.</p>
                    <a href="{{ route('settings.index') }}" class="btn btn-primary">Manage Settings</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
