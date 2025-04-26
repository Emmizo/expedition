@extends('layouts.guest')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-body p-5">
                <h2 class="mb-4 text-center">{{ __('Forgot Your Password?') }}</h2>
                <p class="mb-4 text-muted text-center">{{ __('No problem. Enter your email address and we will email you a password reset link.') }}</p>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-decoration-none">&larr; {{ __('Back to Login') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

