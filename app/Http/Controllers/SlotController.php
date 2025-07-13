<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SlotController extends Controller
{
    public function getCalendar(Request $request)
    {
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year);

        $date = Carbon::createFromDate($year, $month, 1);

        $start = $date->copy()->startOfMonth()->toDateString();
        $end = $date->copy()->endOfMonth()->toDateString();

        $slotRecords = DB::table('slots')
            ->whereBetween('date', [$start, $end])
            ->get();
            
        $slots = [];
        foreach ($slotRecords as $slot) {
            $slots[$slot->date] = $slot;
        }   

        return view('filament.pages.slots', [
            'date' => $date,
            'slots' => $slots,
        ]);
    }

    public function getSlotByDate(Request $request)
    {
        $request->validate(['date' => 'required|date']);
        $slot = Slot::where('date', $request->date)->first();
        return response()->json($slot);
    }

      public function fetch(Request $request)
    {
        $date = $request->input('date');

        $slot = DB::table('slots')
            ->whereDate('date', $date)
            ->first();

        return response()->json($slot);
    }


    public function save(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'total_slots' => 'required|integer|min:0',
            'available_slots' => 'required|integer|min:0',
        ]);

        // Check if entry already exists
        $existing = DB::table('slots')
            ->whereDate('date', $validated['date'])
            ->first();

        if ($existing) {
            // Update if exists
            DB::table('slots')
                ->whereDate('date', $validated['date'])
                ->update([
                    'total_slots' => $validated['total_slots'],
                    'available_slots' => $validated['available_slots'],
                    'updated_at' => now(),
                ]);
        } else {
            // Insert new if not exists
            DB::table('slots')->insert([
                'date' => $validated['date'],
                'total_slots' => $validated['total_slots'],
                'available_slots' => $validated['available_slots'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json(['success' => true]);
    }
}
