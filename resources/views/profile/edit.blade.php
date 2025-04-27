@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-5 text-center">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff&size=128" class="rounded-circle mb-3" alt="User Avatar" width="96" height="96">
                    <h2 class="mb-1">{{ Auth::user()->name }}</h2>
                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h4 class="mb-3">Update Profile Information</h4>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h4 class="mb-3">Change Password</h4>
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="mb-3 text-danger">Delete Account</h4>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
