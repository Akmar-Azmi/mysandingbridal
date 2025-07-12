<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|max:2048',
            'name' => 'required|string|max:255',
            'feedback' => 'required|string',
            'theme' => 'required|string',
            'venue' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('client_images', 's3');
            $data['image'] = Storage::disk('s3')->url($path);
        }

        $data['is_visible'] = true;

        Client::create($data);
        return redirect()->back()->with('success', 'Client added successfully.');
    }
}
