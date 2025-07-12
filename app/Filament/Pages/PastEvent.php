<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Event;


class PastEvent extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static string $view = 'filament.pages.pastevent';

    protected static ?string $navigationGroup = 'Gallery';
    protected static ?string $navigationLabel = 'Past Event';
    protected static ?int $navigationSort = 2;


    protected function getViewData(): array
    {
        return [
            'PastEvents' => Event::all(),
        ];
    }

    public function edit($id)
{
    $event = DB::table('events')->find($id);
    return view('filament.pages.events.edit', compact('event'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $data = [
        'title' => $request->title,
        'description' => $request->description,
    ];

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('events', 's3'); // Supabase storage
        $data['image'] = $path;
    }

    DB::table('events')->where('id', $id)->update($data);

    return redirect()->route('admin.events')->with('success', 'Event updated!');
}


}

