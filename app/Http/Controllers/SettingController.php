<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('settings.index', compact('settings'));
    }

    public function edit(Setting $setting)
    {
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $data = $request->validate([
            'value' => 'nullable|string',
        ]);
        $setting->update($data);
        return redirect()->route('settings.index')->with('success', 'Setting updated successfully.');
    }

    public function about()
    {
        $about = Setting::where('key', 'about_us')->value('value');
        return view('about', compact('about'));
    }

    public function contact()
    {
        $contact_email = Setting::where('key', 'contact_email')->value('value');
        $contact_phone = Setting::where('key', 'contact_phone')->value('value');
        $contact_address = Setting::where('key', 'contact_address')->value('value');
        return view('contact', compact('contact_email', 'contact_phone', 'contact_address'));
    }

    public function create()
    {
        return view('settings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => 'required|string|unique:settings,key',
            'value' => 'nullable|string',
        ]);
        Setting::create($data);
        return redirect()->route('settings.index')->with('success', 'Setting added successfully.');
    }
}
