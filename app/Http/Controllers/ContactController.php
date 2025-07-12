<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
     public function edit()
    {   
        $contact = DB::table('contacts')->first(); // assuming 1-row setup
        return view('filament.pages.contact', compact('contact'));
        
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'whatsapp_number' => 'required',
            'email' => 'required|email',
            'address' => 'nullable',
            'open_time' => 'nullable',
            'close_time' => 'nullable',
            'location_embed' => 'nullable',
        ]);

        
        $contact = DB::table('contacts')->first();

        if(!$contact) {
            DB::table('contacts')->insert([
                'whatsapp_number' => $data['whatsapp_number'],
                'email' => $data['email'],
                'address' => $data['address'],
                'open_time' => $data['open_time'],
                'close_time' => $data['close_time'],
                'location_embed' => $data['location_embed'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
        } else {

            DB::table('contacts')->where('id', $contact->id)->update([
                'whatsapp_number' => $data['whatsapp_number'],
                'email' => $data['email'],
                'address' => $data['address'],
                'open_time' => $data['open_time'],
                'close_time' => $data['close_time'],
                'location_embed' => $data['location_embed'],
                'updated_at' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Contact info updated!');
    }

    public function showUserContact()
    {
        $contact = DB::table('contacts')->first();
        return view('contact', compact('contact'));
    }
}
