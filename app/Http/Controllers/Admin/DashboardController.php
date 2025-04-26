<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard view.
     */
    public function index(): View
    {
        $userCount = User::count();
        $postCount = Post::count();
        return view('admin.dashboard', compact('userCount', 'postCount'));
    }
}
