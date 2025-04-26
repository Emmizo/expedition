<?php

namespace App\Http\Controllers;

use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $items = WhyChooseUs::all();
        return view('why_choose_us.index', compact('items'));
    }

    public function create()
    {
        return view('why_choose_us.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
        ]);
        WhyChooseUs::create($data);
        return redirect()->route('why_choose_us.index')->with('success', 'Item created successfully.');
    }

    public function edit(WhyChooseUs $whyChooseUs)
    {
        return view('why_choose_us.edit', compact('whyChooseUs'));
    }

    public function update(Request $request, WhyChooseUs $whyChooseUs)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
        ]);
        $whyChooseUs->update($data);
        return redirect()->route('why_choose_us.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(WhyChooseUs $whyChooseUs)
    {
        $whyChooseUs->delete();
        return redirect()->route('why_choose_us.index')->with('success', 'Item deleted successfully.');
    }
}
