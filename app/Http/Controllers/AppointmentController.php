<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        // Store form data into DB
        Appointment::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'event_type' => $request->eventType,
            'budget' => $request->budget,
            'appointment_date' => $request->date,
            'appointment_time' => $request->time,
            'notes' => $request->notes,
        ]);

        return response()->json(['success' => true]);
    }
}
