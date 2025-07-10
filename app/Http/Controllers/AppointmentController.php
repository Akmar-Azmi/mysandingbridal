<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'state' => 'required',
            'package' => 'required',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Appointment::create([
            'name' => $validated['name'],
            'age' => $validated['age'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'postcode' => $validated['postcode'],
            'state' => $validated['state'],
            'package' => $validated['package'],
            'start_time' => $validated['date'] . ' ' . $validated['time'],
            'end_time' => $validated['date'] . ' ' . $validated['time'], // can adjust if needed
            'title' => $validated['name'],
        ]);

        return response()->json(['message' => 'Appointment saved successfully!']);
    }
}
