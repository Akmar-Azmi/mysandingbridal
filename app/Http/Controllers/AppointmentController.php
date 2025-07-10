<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request)
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

        Appointment::create($validated);

        return response()->json(['message' => 'Appointment saved successfully!']);
    }
}
