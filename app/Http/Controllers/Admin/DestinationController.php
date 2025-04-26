<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $query = Destination::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")->orWhere('slug', 'like', "%{$search}%");
        }
        if ($request->filled('filter')) {
            if ($request->filter === 'popular') {
                $query->where('is_popular', true);
            } elseif ($request->filter === 'not_popular') {
                $query->where('is_popular', false);
            }
        }
        $destinations = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('admin.destinations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:destinations,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_popular' => 'nullable|boolean',
        ]);
        $data['is_popular'] = $request->has('is_popular');
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('destinations', 'public');
        }
        Destination::create($data);
        return redirect()->route('admin.destinations.index')->with('success', 'Destination created successfully.');
    }

    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:destinations,slug,' . $destination->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_popular' => 'nullable|boolean',
        ]);
        $data['is_popular'] = $request->has('is_popular');
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('destinations', 'public');
        }
        $destination->update($data);
        return redirect()->route('admin.destinations.index')->with('success', 'Destination updated successfully.');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('admin.destinations.index')->with('success', 'Destination deleted successfully.');
    }
}
