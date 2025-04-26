<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts & Styles -->
        <!-- @vite(['resources/scss/app.scss', 'resources/js/app.js']) -->

        <!-- Custom CSS -->
        <!-- <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"> -->

        <!-- Bootstrap 5 CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap Icons CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #C4D1D4;">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }} Logo" style="height: 40px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="safariDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Safaris
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="safariDropdown">
                                    <li><a class="dropdown-item" href="{{ route('safaris.show', 'majestic-gorilla-trekking') }}">Gorilla Trekking</a></li>
                                    <li><a class="dropdown-item" href="{{ route('safaris.show', 'rwanda-primate-paradise') }}">Rwanda Safaris</a></li>
                                    <li><a class="dropdown-item" href="{{ route('safaris.show', 'uganda-pearl-of-africa') }}">Uganda Safaris</a></li>
                                    <li><a class="dropdown-item" href="{{ route('safaris.show', 'east-africa-explorer-multi-country') }}">Multi-Country</a></li>
                                </ul>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blog.index') }}">{{ __('Blog') }}</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            {{ __('Profile') }}
                                        </a>
                                        @hasrole('admin')
                                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                                {{ __('Admin Dashboard') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('admin.manage-users') }}">
                                                {{ __('Manage Users') }}
                                            </a>
                                        @endhasrole
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            {{-- Apply custom background color to MAIN element --}}
            <main class="py-4" style="background-color: #C4D1D4;">
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow-sm mb-4">
                        <div class="container">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                @yield('content')
            </main>

            {{-- New Footer Structure --}}
            <footer class="py-5 mt-auto bg-primary text-light">
                <div class="container">
                    <div class="row">
                        {{-- Logo Column --}}
                        <div class="col-lg-3 mb-4 mb-lg-0">
                            <a class="navbar-brand fw-bold d-block mb-3" href="{{ url('/') }}">
                                 {{-- Use the actual logo image --}}
                                 <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }} Logo" style="height: 40px;">
                             </a>
                             <p class="small text-light opacity-75">Crafting unforgettable safari adventures.</p>
                        </div>

                        {{-- Quick Links Column --}}
                        <div class="col-lg-2 col-md-4 col-6 mb-4 mb-lg-0">
                            <h6 class="text-white mb-3">Quick Links</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="{{ route('home') }}" class="text-light text-decoration-none">Home</a></li>
                                <li class="mb-2"><a href="{{ route('about') }}" class="text-light text-decoration-none">About Us</a></li>
                                 <li class="mb-2"><a href="{{ route('contact') }}" class="text-light text-decoration-none">Contact Us</a></li>
                                 <li class="mb-2"><a href="{{ route('blog.index') }}" class="text-light text-decoration-none">Blog</a></li>
                            </ul>
                        </div>

                        {{-- Safaris Column --}}
                        <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                            <h6 class="text-white mb-3">Our Safaris</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="{{ route('safaris.show', 'majestic-gorilla-trekking') }}" class="text-light text-decoration-none">Gorilla Trekking</a></li>
                                <li class="mb-2"><a href="{{ route('safaris.show', 'rwanda-primate-paradise') }}" class="text-light text-decoration-none">Rwanda Safaris</a></li>
                                <li class="mb-2"><a href="{{ route('safaris.show', 'uganda-pearl-of-africa') }}" class="text-light text-decoration-none">Uganda Safaris</a></li>
                                <li class="mb-2"><a href="{{ route('safaris.show', 'east-africa-explorer-multi-country') }}" class="text-light text-decoration-none">Multi-Country</a></li>
                                {{-- Add link to see all if applicable --}}
                                {{-- <li class="mt-2"><a href="#" class="text-light text-decoration-none fw-bold">View All -></a></li> --}}
                            </ul>
                        </div>

                        {{-- Connect Column --}}
                         <div class="col-lg-4 col-md-4 mb-4 mb-lg-0">
                            <h6 class="text-white mb-3">Connect With Us</h6>
                            <p class="small text-light opacity-75 mb-3">Follow us on social media for the latest updates and stunning visuals.</p>
                            <div>
                                {{-- Placeholder links - update hrefs --}}
                                 <a href="#" class="text-white me-3 fs-4 text-decoration-none"><i class="bi bi-linkedin"></i></a>
                                 <a href="#" class="text-white me-3 fs-4 text-decoration-none"><i class="bi bi-facebook"></i></a>
                                 <a href="#" class="text-white me-3 fs-4 text-decoration-none"><i class="bi bi-instagram"></i></a>
                                 <a href="#" class="text-white fs-4 text-decoration-none"><i class="bi bi-twitter-x"></i></a>
                            </div>
                        </div>
                    </div>

                    {{-- Copyright --}}
                    <hr class="my-4 border-light opacity-25">
                    <div class="text-center">
                        <small class="text-light opacity-75">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All Rights Reserved.</small>
                    </div>
                </div>
            </footer>

        </div>
        <!-- jQuery CDN (if needed for legacy plugins) -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
        <!-- Bootstrap 5 JS Bundle CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
                console.log('Bootstrap dropdown is available');
                var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
                var dropdownList = dropdownElementList.map(function(element) {
                    return new bootstrap.Dropdown(element);
                });
            } else {
                console.error('Bootstrap dropdown not available');
            }
        });
        </script>
    </body>
</html>
