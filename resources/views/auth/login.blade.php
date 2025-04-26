@extends('layouts.guest')

@section('content')
    <h2 class="text-center mb-4">{{ __('Login to Your Account') }}</h2>

    {{-- Session Status --}}
    @if (session('status'))
        <div class="alert alert-success mb-3" role="alert">
            {{ session('status') }}
        </div>
    @endif

     {{-- Validation Errors --}}
     @if ($errors->any())
        <div class="alert alert-danger mb-3" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            {{-- Use @error directive for cleaner error display --}}
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
             <div class="d-flex justify-content-between">
                 <label for="password" class="form-label">{{ __('Password') }}</label>
                 @if (Route::has('password.request'))
                    <a class="text-sm text-decoration-none" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
             </div>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
             @error('password')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">
                {{ __('Log in') }}
            </button>
        </div>

         <div class="text-center mt-4">
             <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Register here</a></p>
         </div>

    </form>

@endsection

