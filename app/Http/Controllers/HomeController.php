<?php

namespace App\Http\Controllers;

use App\Models\Destination;  // Import Destination model (Assumption: Exists)
use App\Models\Post;
use App\Models\Safari;  // Import Safari model
use App\Models\Slider;  // Import Slider model (Assumption: Exists)
use App\Models\Testimonial;  // Import Testimonial model (Assumption: Exists)
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch existing featured safaris
        $featuredSafaris = Safari::latest()->take(3)->get();

        // Fetch data for other dynamic sections (Add error handling/defaults as needed)
        $sliders = Slider::where('is_active', true)->orderBy('order', 'asc')->get();  // Example query
        $popularDestinations = Destination::where('is_popular', true)->take(5)->get();  // Example query
        $testimonials = Testimonial::latest()->take(3)->get();  // Example query

        // Fetch latest published posts
        $latestPosts = Post::whereNotNull('published_at')
            ->latest('published_at')
            ->with('user')
            ->take(3)
            ->get();

        $whyChooseUsItems = \App\Models\WhyChooseUs::all();
        $teamMembers = \App\Models\TeamMember::all();
        $services = \App\Models\Service::all();

        return view('welcome', compact(
            'featuredSafaris',
            'sliders',
            'popularDestinations',
            'testimonials',
            'latestPosts',
            'whyChooseUsItems',
            'teamMembers',
            'services'
        ));
    }
}
