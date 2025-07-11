<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class PageController extends Controller
{
    public function about()
    {
        $teams = Team::all();
        return view('about', compact('teams'));
    }
}
