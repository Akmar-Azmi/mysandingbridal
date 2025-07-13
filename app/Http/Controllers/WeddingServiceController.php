<?php

namespace App\Http\Controllers;

use App\Models\WedService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WeddingServiceController extends Controller
{
    /**
     * Update the fixed wedding service.
     */
    public function update(Request $request, $id)
    {
        $service = WedService::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        $data['image'] = $request->image ?? $service->image;
        $data['updated_at'] = Carbon::now();

        $service->update($data);

        return redirect()->back()->with('success', 'Wedding service updated successfully.');
    }
}
