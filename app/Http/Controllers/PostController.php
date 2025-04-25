<?php

namespace App\Http\Controllers;

use App\Models\Post;  // Import Post model
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch published posts, newest first, with author details
        $posts = Post::whereNotNull('published_at')
            ->latest('published_at')
            ->with('user')  // Eager load the author
            ->paginate(10);  // Add pagination

        return view('blog.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)  // Using default route model binding (ID)
    {
        // Optionally add check for published_at if draft posts shouldn't be public
        // if (!$post->published_at && (!auth()->check() || !auth()->user()->hasRole('admin'))) {
        //     abort(404);
        // }

        // Eager load author
        $post->load('user');

        return view('blog.show', compact('post'));
    }

    // Other resource methods (create, store, edit, update, destroy) would go here
    // for admin functionality later.
}
