<nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <img src="https://via.placeholder.com/150x40?text=Expediction" alt="{{ config('app.name', 'Laravel') }} Logo" style="height: 40px;">
            {{-- config('app.name', 'Laravel') --}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar (or Center) -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>

                {{-- Safaris Dropdown --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('safaris/*') ? 'active' : '' }}" href="#" id="safariDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Safaris
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="safariDropdown">
                        <li><a class="dropdown-item {{ request()->is('safaris/majestic-gorilla-trekking') ? 'active' : '' }}" href="{{ route('safaris.show', 'majestic-gorilla-trekking') }}">Gorilla Safaris</a></li>
                        <li><a class="dropdown-item {{ request()->is('safaris/rwanda-primate-paradise') ? 'active' : '' }}" href="{{ route('safaris.show', 'rwanda-primate-paradise') }}">Rwanda Safaris</a></li>
                        <li><a class="dropdown-item {{ request()->is('safaris/congo-untamed-wilderness') ? 'active' : '' }}" href="{{ route('safaris.show', 'congo-untamed-wilderness') }}">Congo Safaris</a></li>
                        <li><a class="dropdown-item {{ request()->is('safaris/uganda-pearl-of-africa') ? 'active' : '' }}" href="{{ route('safaris.show', 'uganda-pearl-of-africa') }}">Uganda Safaris</a></li>
                        <li><a class="dropdown-item {{ request()->is('safaris/east-africa-explorer-multi-country') ? 'active' : '' }}" href="{{ route('safaris.show', 'east-africa-explorer-multi-country') }}">Multi Country Safaris</a></li>
                        {{-- Add a divider if desired --}}
                        {{-- <li><hr class="dropdown-divider"></li> --}}
                        {{-- Add a link to a general safaris overview page if one exists --}}
                        {{-- <li><a class="dropdown-item" href="#">All Safaris</a></li> --}}
                    </ul>
                </li>

                <li class="nav-item">
                    {{-- Update blog route name based on previous changes --}}
                    <a class="nav-link {{ request()->routeIs('blog.index') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About US</a>
                </li>
                {{-- Contact moved to the right as a button --}}
                 {{-- Dashboard link - only visible to admins --}}
                 @auth
                     @role('admin') {{-- Use Spatie's @role directive --}}
                     <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                     @endrole
                 @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                 <!-- Contact Button -->
                 <li class="nav-item me-2"> {{-- Add margin --}}
                     <a href="{{ route('contact') }}" class="btn btn-outline-light">Contact Us</a>
                 </li>

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
