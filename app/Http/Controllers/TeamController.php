<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        // For store()
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('team_photos', 'public');
            $data['photo'] = $path; // only store the path!
        }

        Team::create($data);
        return redirect()->back()->with('success', 'Team member added!');
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        // For update()
        if ($request->hasFile('photo')) {
            if ($team->photo) {
                Storage::disk('public')->delete($team->photo);
            }

            $path = $request->file('photo')->store('team_photos', 'public');
            $data['photo'] = $path; // only store the path
        }

        $team->update($data);

        return redirect()->back()->with('success', 'Team member updated!');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->back()->with('success', 'Team member deleted!');
    }

    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index', compact('teams'));
    }

    public function about()
    {
        $teams = Team::all(); 
        return view('about', compact('teams')); 
    }
}
