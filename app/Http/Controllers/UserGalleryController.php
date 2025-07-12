<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class UserGalleryController extends Controller
{
    public function index()
    {
        $images = Gallery::where('is_visible', true)->latest()->get();
        return view('gallery', compact('images'));
    }
}

