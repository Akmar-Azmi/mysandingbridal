<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments'; 
    protected $fillable = [
        'name',
        'phone',
        'email',
        'event_type',
        'budget',
        'appointment_date',
        'appointment_time',
        'notes',
    ];
}
