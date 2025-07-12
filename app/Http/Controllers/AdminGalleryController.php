<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AdminGalleryController extends Controller
{
    public function index()
    {
       return view('filament.pages.galleryphoto', [
        'images' => Gallery::all()
]);

    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|url'
        ]);

         $gallery = \App\Models\Gallery::create([
        'url' => $request->image,
        'is_visible' => true,
         ]);

        return redirect()->back()->with([
        'success' => 'Image saved!',
        'newImageUrl' => $gallery->url,
        ]);
    }

    public function destroy($id)
        {
    $image = Gallery::findOrFail($id);

    // Optionally delete from Cloudinary (if needed)
    // Cloudinary::destroy(public_id) // ← if you stored public_id

    $image->delete();

    return redirect()->back()->with('success', 'Image deleted successfully!');
}
}
