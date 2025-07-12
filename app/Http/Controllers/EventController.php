<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class EventController extends Controller
{
        public function index(){
        $PastEvents = Event :: all(); // Eloquent: returns objects
        return view( 'filament.pages.gallery', compact('PastEvents'));
        }

        public function store(Request $request){
        $data = $request->validate([
            'title' => 'required | string| max : 255',
            'image' => 'nullable | image | max: 2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);
        return redirect()->back()->with('success', 'Event added successfully!');
    }

    public function destroy($id)
    {
        $event = Event :: findOrFail($id);
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        $event->delete();
        return redirect()->back()->with('success', 'Event deleted successfully!');
    }

    public function update(Request $request, $id)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $event = Event::findOrFail($id);

    // Upload image kalau ada
    if ($request->hasFile('image')) {
        // Optional: Delete old image if needed
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $data['image'] = $request->file('image')->store('events', 'public');
    }

    $event->update($data);

    return redirect()->route('events.index')->with('success', 'Event updated successfully!');
}
}