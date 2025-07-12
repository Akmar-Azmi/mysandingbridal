<?php

namespace App\Filament\Pages;

use App\Models\Contact as ContactModel;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;


class Contact  extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static string $view = 'filament.pages.contact';
    protected static ?int $navigationSort = 7;
    protected static ?string $slug = 'contact';
    protected static ?string $navigationLabel = 'Contact';

    public $whatsapp_number;
    public $email;
    public $address;
    public $open_time;
    public $close_time;
    public $location_embed;

     public function mount()
    {
        $contact = ContactModel::first();
        if ($contact) {
            $this->whatsapp_number = $contact->whatsapp_number;
            $this->email = $contact->email;
            $this->address = $contact->address;
            $this->open_time = $contact->open_time;
            $this->close_time = $contact->close_time;
            $this->location_embed = $contact->location_embed;
        }
    }


    public function save()
    {
        $this->validate([
            'whatsapp_number' => 'required',
            'email' => 'required|email',
            'address' => 'nullable',
            'open_time' => 'nullable',
            'close_time' => 'nullable',
            'location_embed' => 'nullable',
        ]);

        ContactModel::updateOrCreate([], [
            'whatsapp_number' => $this->whatsapp_number,
            'email' => $this->email,
            'address' => $this->address,
            'open_time' => $this->open_time,
            'close_time' => $this->close_time,
            'location_embed' => $this->location_embed,
        ]);

       session()->flash('notify', ['message' => 'Contact info updated.']);
    }

    // The render() method is not needed; Filament\Pages\Page handles rendering via the $view property.
}
