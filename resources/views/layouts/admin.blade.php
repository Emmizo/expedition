<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel | {{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background: #f4f6fa; }
        .sidebar {
            min-height: 100vh;
            background: #212529;
            color: #fff;
            box-shadow: 2px 0 8px rgba(0,0,0,0.04);
        }
        .sidebar .nav-link { color: #adb5bd; font-size: 1.05rem; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { color: #fff; background: #343a40; }
        .sidebar .logo {
            font-size: 1.6rem;
            font-weight: bold;
            color: #fff;
            padding: 2rem 1rem 1.5rem 1rem;
            display: block;
            text-align: center;
            letter-spacing: 1px;
        }
        .sidebar .nav-link i { margin-right: 0.7rem; }
        .admin-navbar { background: #fff; border-bottom: 1px solid #dee2e6; box-shadow: 0 2px 6px rgba(0,0,0,0.03); }
        .admin-navbar .navbar-brand { font-weight: bold; }
        .admin-navbar .dropdown-menu { right: 0; left: auto; }
        .main-content { min-height: 100vh; background: #f4f6fa; }
        @media (max-width: 991.98px) {
            .sidebar { position: fixed; z-index: 1040; left: -220px; width: 220px; transition: left 0.3s; }
            .sidebar.show { left: 0; }
            .main-content { margin-left: 0 !important; }
        }
        .sidebar-toggler {
            border: none;
            background: none;
            color: #212529;
            font-size: 1.5rem;
            margin-right: 1rem;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="col-lg-2 d-lg-block sidebar p-0 position-fixed">
            <div class="logo mb-4">
                <a href="/" class="text-white text-decoration-none">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <ul class="nav flex-column mb-4">
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('manage-users*') ? 'active' : '' }}" href="{{ route('manage-users') }}"><i class="bi bi-people"></i> Users</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('admin.posts*') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}"><i class="bi bi-journal-text"></i> Posts</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('admin.sliders*') ? 'active' : '' }}" href="{{ route('admin.sliders.index') }}"><i class="bi bi-images"></i> Sliders</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('admin.safaris*') ? 'active' : '' }}" href="{{ route('admin.safaris.index') }}"><i class="bi bi-binoculars"></i> Safaris</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('admin.destinations*') ? 'active' : '' }}" href="{{ route('admin.destinations.index') }}"><i class="bi bi-geo-alt"></i> Destinations</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}"><i class="bi bi-chat-quote"></i> Testimonials</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('admin.team-members*') ? 'active' : '' }}" href="{{ route('admin.team-members.index') }}"><i class="bi bi-person-badge"></i> Team Members</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}"><i class="bi bi-briefcase"></i> Services</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('settings*') ? 'active' : '' }}" href="{{ route('settings.index') }}"><i class="bi bi-gear"></i> Settings</a>
                </li>
                <li class="nav-item mt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-danger w-100" type="submit"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- Main Content -->
        <div class="col-lg-10 offset-lg-2 main-content p-0">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light admin-navbar px-4">
                <button class="sidebar-toggler d-lg-none" type="button" onclick="document.getElementById('sidebarMenu').classList.toggle('show')">
                    <i class="bi bi-list"></i>
                </button>
                <div class="container-fluid">
                    <span class="navbar-brand">Admin Panel</span>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item text-danger" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
