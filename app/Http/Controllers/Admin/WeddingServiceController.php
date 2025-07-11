<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WeddingService;
use Illuminate\Support\Facades\Storage;

class WeddingServiceController extends Controller
{
    /**
     * Display a listing of the wedding services.
     */
    public function index()
    {
        $weddingServices = WeddingService::all()->map(function ($item) {
            return $item->toArray(); // Convert each Eloquent model to array
        })->all();

        // Dummy data for other services (can replace with real model later)
        $otherServices = [
            ['name' => 'Makeup & Touchup', 'image' => '/images/makeup.jpg'],
            ['name' => 'Photobooth Rental', 'image' => '/images/photo.jpg'],
        ];

        return view('admin.services', compact('weddingServices', 'otherServices'));
    }

    /**
     * Show the form for creating a new wedding service.
     */
    public function create()
    {
        return view('admin.wedding-services.create');
    }

    /**
     * Store a newly created wedding service.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('wedding-services', 'public');

        WeddingService::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => '/storage/' . $imagePath,
        ]);

        return redirect()->route('admin.services.wedding-services.index')
                         ->with('success', 'Wedding service added successfully.');
    }

    /**
     * Show the form for editing an existing wedding service.
     */
    public function edit($id)
    {
        $service = WeddingService::findOrFail($id)->toArray(); // Convert to array
        return view('admin.wedding-services.edit', compact('service'));
    }

    /**
     * Update the specified wedding service.
     */
    public function update(Request $request, $id)
    {
        $service = WeddingService::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image && Storage::disk('public')->exists(str_replace('/storage/', '', $service->image))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $service->image));
            }

            $imagePath = $request->file('image')->store('wedding-services', 'public');
            $validated['image'] = '/storage/' . $imagePath;
        }

        $service->update($validated);

        return redirect()->route('admin.services.wedding-services.index')
                         ->with('success', 'Wedding service updated successfully.');
    }

    /**
     * Remove the specified wedding service.
     */
    public function destroy($id)
    {
        $service = WeddingService::findOrFail($id);

        if ($service->image && Storage::disk('public')->exists(str_replace('/storage/', '', $service->image))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $service->image));
        }

        $service->delete();

        return redirect()->route('admin.services.wedding-services.index')
                         ->with('success', 'Wedding service deleted.');
    }
}
