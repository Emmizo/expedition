<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SafariController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// Admin Controllers Namespace
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationController as AdminDestinationController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\SafariController as AdminSafariController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WhyChooseUsController;
use App\Models\Post;
use App\Models\User;

// Define the Home route first, ensuring it's processed before potential redirects
Route::get('/', [HomeController::class, 'index'])->name('home');

// Public Routes (apply web middleware group explicitly for clarity if needed, though usually default)
Route::middleware('web')->group(function () {
    // Safari Route (using slug)
    Route::get('/safaris/{safari:slug}', [SafariController::class, 'show'])->name('safaris.show');

    // Blog Routes
    Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
    Route::get('/blog/{post}', [PostController::class, 'show'])->name('blog.show');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    // Authenticated Routes (already applies 'web' via the outer group, plus 'auth', 'verified')
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', function () {
            $userCount = User::count();
            $postCount = Post::count();
            return view('dashboard', compact('userCount', 'postCount'));
        })
            ->middleware([\Spatie\Permission\Middleware\RoleMiddleware::class . ':admin'])
            ->name('dashboard');

        Route::get('/manage-users', [UserController::class, 'index'])
            ->middleware([\Spatie\Permission\Middleware\RoleMiddleware::class . ':admin'])
            ->name('manage-users');

        // User resource routes (assuming you might add create/store/edit/update/destroy later)
        // Route::resource('manage-users', UserController::class)->middleware([\Spatie\Permission\Middleware\RoleMiddleware::class . ':admin']);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // --- Admin Routes ---
        Route::prefix('admin')
            ->middleware([\Spatie\Permission\Middleware\RoleMiddleware::class . ':admin'])
            ->name('admin.')  // Route name prefix (e.g., admin.dashboard)
            ->group(function () {
                // Dashboard
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

                // User Management (Keep existing route, but maybe move under /admin later?)
                Route::get('/manage-users', [UserController::class, 'index'])->name('manage-users');
                // Add User CRUD routes here if needed (e.g., Route::resource('users', UserController::class);)

                // Content Management Resources
                Route::resource('sliders', SliderController::class);
                Route::resource('safaris', AdminSafariController::class);
                Route::resource('destinations', AdminDestinationController::class);
                Route::resource('testimonials', TestimonialController::class);
                Route::resource('posts', AdminPostController::class);  // Use aliased controller
            });
        // --- End Admin Routes ---

        Route::get('dashboard', function () {
            return view('dashboard.index');
        })->name('dashboard');

        Route::resource('dashboard/why-choose-us', WhyChooseUsController::class)->except(['show']);
        Route::resource('dashboard/settings', SettingController::class)->only(['index', 'edit', 'update']);
    });

    // Include auth routes within the 'web' middleware group
    require __DIR__ . '/auth.php';
});
