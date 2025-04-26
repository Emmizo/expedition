<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::latest()->paginate(10);
        return view('admin.team_members.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team_members.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image_path' => 'nullable|image',
            'linkedin_url' => 'nullable|url',
        ]);
        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('team', 'public');
        }
        TeamMember::create($data);
        return redirect()->route('admin.team-members.index')->with('success', 'Team member created successfully.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team_members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image_path' => 'nullable|image',
            'linkedin_url' => 'nullable|url',
        ]);
        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('team', 'public');
        }
        $teamMember->update($data);
        return redirect()->route('admin.team-members.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();
        return redirect()->route('admin.team-members.index')->with('success', 'Team member deleted successfully.');
    }
}
