<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SlotApiController extends Controller
{
    private $supabaseUrl;
    private $supabaseKey;

    public function __construct()
    {
        $this->supabaseUrl = env('SUPABASE_URL');
        $this->supabaseKey = env('SUPABASE_API_KEY');
    }

    public function getSlotCount(Request $request)
    {
        $date = $request->query('date');

        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
        ])->get($this->supabaseUrl . '/rest/v1/slots', [
            'select' => 'available_slots',
            'date' => "eq.$date"
        ]);

        if ($response->successful() && isset($response[0]['available_slots'])) {
            return response()->json([
                'slots' => $response[0]['available_slots']
            ]);
        }

        return response()->json(['slots' => 0]);
    }

    public function getSlotDates()
    {
        $response = Http::withHeaders([
            'apikey' => $this->supabaseKey,
            'Authorization' => 'Bearer ' . $this->supabaseKey,
        ])->get($this->supabaseUrl . '/rest/v1/slots', [
            'select' => 'date,available_slots',
            'available_slots' => 'gt.0'
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json([]);
    }
}
