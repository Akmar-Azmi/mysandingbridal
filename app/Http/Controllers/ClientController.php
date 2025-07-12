<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ClientController extends Controller
{
    // 📥 Store new client (with image)
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'theme'    => 'required|string|max:255',
            'venue'    => 'required|string|max:255',
            'feedback' => 'required|string',
            'image'    => 'required|url' // ✅ this is now a URL, not a file
        ]);

        Client::create([
            'name'       => $request->name,
            'theme'      => $request->theme,
            'venue'      => $request->venue,
            'feedback'   => $request->feedback,
            'image'      => $request->image, // ✅ this is already a Cloudinary URL
            'is_visible' => true,
        ]);

        return redirect()->back()->with('success', 'Client added successfully!');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $client->name = $request->name;
        $client->theme = $request->theme;
        $client->venue = $request->venue;
        $client->feedback = $request->feedback;

        // Only update image if a new one is uploaded
        if ($request->filled('image')) {
            $client->image = $request->image;
        }


        $client->save();

        return redirect()->back()->with('success', 'Client updated!');
    }



    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->back()->with('success', 'Client deleted!');
    }
}
