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

        if ($contact && $contact->whatsapp_number) {
            foreach(['+60','+65', '+62', '+1', '+84'] as $code) {
                if (str_starts_with($contact->whatsapp_number, $code)) {
                    $contact->whatsapp_code = $code;
                    $contact->whatsapp_number = substr($contact->whatsapp_number, strlen($code));
                    break;
                }
            }
        }

        return view('filament.pages.contact', compact('contact'));
    
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'whatsapp_code' => 'required',
            'whatsapp_number' => 'required',
            'email' => 'required|email',
            'address' => 'nullable',
            'open_time' => 'nullable',
            'close_time' => 'nullable',
            'location_embed' => 'nullable',
        ]);

        //combine whatsapp code and number
        $fullWhatspp = $data['whatsapp_code'] . $data['whatsapp_number'];

        //strip/remove the <iframe> from the location_embed
        $data['location_embed'] = $this->extractIframeSrc($data['location_embed']);
        

        $contact = DB::table('contacts')->first();

        if(!$contact) {
            DB::table('contacts')->insert([
                'whatsapp_number' => $fullWhatspp,
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
                'whatsapp_number' => $fullWhatspp,
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

   private function extractIframeSrc($iframe)
    {
        libxml_use_internal_errors(true); // avoid parsing warnings

        $doc = new \DOMDocument();

        // Wrap in basic HTML structure to avoid parsing failure
        $iframe = '<!DOCTYPE html><html><body>' . $iframe . '</body></html>';

        $doc->loadHTML($iframe);
        $tags = $doc->getElementsByTagName('iframe');

        foreach ($tags as $tag) {
            return $tag->getAttribute('src'); // ✅ returns the src only
        }

        return null; // fallback if no iframe found
    }

}

