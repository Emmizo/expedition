@extends('layouts.guest')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-body p-5">
                <h2 class="mb-4 text-center">{{ __('Confirm Password') }}</h2>
                <p class="mb-4 text-muted text-center">{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">
                            {{ __('Confirm') }}
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

