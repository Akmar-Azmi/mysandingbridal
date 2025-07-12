<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PublicClientController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'apikey' => env('SUPABASE_API_KEY'), // should be anon/public API key
            'Authorization' => 'Bearer ' . env('SUPABASE_API_KEY'),
        ])->get('https://ubamipcdottoorjzmnfd.supabase.co/rest/v1/clients', [
            'select' => '*',
            'is_visible' => 'eq.true',
            'order' => 'created_at.desc',
        ]);

       $clients = $response->successful() ? $response->json() : [];


        return view('clients', compact('clients')); // <--- this makes $clients available in Blade
    }
}
