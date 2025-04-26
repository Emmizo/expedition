<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Safari;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SafariController extends Controller
{
    public function index(Request $request)
    {
        $query = Safari::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")->orWhere('slug', 'like', "%{$search}%");
        }
        if ($request->filled('filter')) {
            if ($request->filter === 'featured') {
                $query->where('is_featured', true);
            } elseif ($request->filter === 'not_featured') {
                $query->where('is_featured', false);
            }
        }
        $safaris = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        return view('admin.safaris.index', compact('safaris'));
    }

    public function create()
    {
        return view('admin.safaris.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:safaris,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);
        $data['is_featured'] = $request->has('is_featured');
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('safaris', 'public');
        }
        Safari::create($data);
        return redirect()->route('admin.safaris.index')->with('success', 'Safari created successfully.');
    }

    public function edit(Safari $safari)
    {
        return view('admin.safaris.edit', compact('safari'));
    }

    public function update(Request $request, Safari $safari)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:safaris,slug,' . $safari->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);
        $data['is_featured'] = $request->has('is_featured');
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('safaris', 'public');
        }
        $safari->update($data);
        return redirect()->route('admin.safaris.index')->with('success', 'Safari updated successfully.');
    }

    public function destroy(Safari $safari)
    {
        $safari->delete();
        return redirect()->route('admin.safaris.index')->with('success', 'Safari deleted successfully.');
    }
}
