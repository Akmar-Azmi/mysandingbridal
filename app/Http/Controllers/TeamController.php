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

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team_photos', 'public');
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

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($team->photo) {
                Storage::disk('public')->delete($team->photo);
            }

            // Store new photo
            $data['photo'] = $request->file('photo')->store('team_photos', 'public');
        }

        $team->update($data);

        return redirect()->back()->with('success', 'Team member updated!');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        if ($team->photo) {
            Storage::disk('public')->delete($team->photo);
        }
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
        $teams = Team::all(); // fetch all team members
        return view('about', compact('teams')); // pass it to the view
    }

}