<?php

namespace App\Http\Controllers;

use App\Models\OtherServices;
use Illuminate\Http\Request;

class OtherServiceController extends Controller
{
    public function index()
    {
       
        $otherServices = OtherServices::orderBy('id')->get();

        return view('filament.pages.otherservice', compact('otherServices'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|string',
        ]);

        $data['created_at'] = now();
        $data['updated_at'] = now();

        OtherServices::create($data);

        return redirect()->back()->with('success', 'Other service added successfully.');
    }

    public function update(Request $request, $id)
    {
        $service = OtherServices::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        $data['image'] = $request->image ?? $service->image;
        $data['updated_at'] = now();

        $service->update($data);

        return redirect()->back()->with('success', 'Other service updated successfully.');
    }

    public function destroy($id)
    {
        $service = OtherServices::findOrFail($id);
        $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully.');
    }
}
