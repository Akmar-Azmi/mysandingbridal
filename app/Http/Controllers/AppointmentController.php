<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
            'state' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
        ]);

        // Save to Supabase
        $appointment = Appointment::create([
            'title' => $data['name'],
            'start_time' => $data['date'] . ' ' . $data['time'],
            'end_time' => $data['date'] . ' ' . $data['time'], 
        ]);

        // WhatsApp link
        $msg = "Hi, saya nak buat appointment:\n\n" .
               "Nama: {$data['name']}\n" .
               "Umur: {$data['age']}\n" .
               "Telefon: {$data['phone']}\n" .
               "Email: {$data['email']}\n" .
               "Alamat: {$data['address']}, {$data['city']}, {$data['postcode']}, {$data['state']}\n" .
               "Tarikh: {$data['date']}\n" .
               "Masa: {$data['time']}";

        $whatsapp = 'https://wa.me/60194248847?text=' . urlencode($msg); // replace with your actual number

        return redirect($whatsapp);
    }
}
