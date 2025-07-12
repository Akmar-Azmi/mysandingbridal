<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class TeamController extends Controller
{
    public function store(Request $request)
    {   
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo' => 'nullable|string|url|max:2048', // ✅ Expect a Cloudinary URL
        ]);
        
        if ($request->hasFile('photo')) {
        $uploadedFile = $request->file('photo');
        $cloudinaryUpload = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
        $data['photo'] = $cloudinaryUpload; // store Cloudinary image URL
    }
        \App\Models\Team::create($data);
        return redirect()->back()->with('success', 'Team member added!');
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'photo' => 'nullable|file|image|max:2048',    
        ]);

        if ($request->hasFile('photo')) {
            $uploadedFile = $request->file('photo');
            $cloudinaryUpload = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
            $data['photo'] = $cloudinaryUpload;
            // Delete old photo if exists
            if ($team->photo) {
                Storage::disk('public')->delete($team->photo);
            }

    
        // Store new photo
            $data['photo'] = $request->file('photo')->store('team_photos', 'public');
        }

        $team->update($data);
        return back()->with('success', 'Team updated!');
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
