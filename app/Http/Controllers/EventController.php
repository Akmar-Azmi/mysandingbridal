<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class EventController extends Controller
{
    public function index()
    {
        $PastEvents = Event::all();
        return view('filament.pages.pastevent', compact('PastEvents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'image' => 'required|url'
        ]);

        Event::create($validated); // stored into Supabase if configured

        return redirect()->back()->with('success', 'Event added!');
    }

   public function update(Request $request, $id)
{
    $event = Event::findOrFail($id);

    $event->title = $request->title;
    $event->description = $request->description;
    $event->image = $request->image; // already a Cloudinary URL

    $event->save();

    return redirect()->back()->with('success', 'Updated successfully!');
}



}
