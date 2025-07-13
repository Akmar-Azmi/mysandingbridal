<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Gallery;
use App\Models\Event;

class PageController extends Controller
{
    public function about()
    {
        $teams = Team::all();
        return view('about', compact('teams'));
    }

    public function gallery()
    {
        $images = Gallery::latest()->get();
        $pastEvents = Event::latest()->get();

        return view('gallery', compact('images', 'pastEvents'));
    }
}
