<?php


namespace App\Http\Controllers;

use App\Models\WeddingService;
use Illuminate\Http\Request;

class WeddingServiceController extends Controller
{
    public function index()
    {
        $weddingServices = WeddingService::all();
        return view('filament.pages.weddingservice', compact('weddingServices'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload to Cloudinary
        $data['image'] = $request->file('image')->storeOnCloudinary('wedding_services')->getSecurePath();

        WeddingService::create($data);

        return redirect()->back()->with('success', 'Wedding service added successfully.');
    }

    public function update(Request $request, $id)
    {
        $service = WeddingService::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storeOnCloudinary('wedding_services')->getSecurePath();
        }

        $service->update($data);

        return redirect()->back()->with('success', 'Wedding service updated successfully.');
    }

    public function destroy($id)
    {
        $service = WeddingService::findOrFail($id);
        $service->delete();

        return redirect()->back()->with('success', 'Wedding service deleted.');
    }
}

