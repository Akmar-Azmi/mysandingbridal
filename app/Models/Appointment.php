<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
    'name', 'age', 'phone', 'email',
    'address', 'city', 'postcode', 'state',
    'package', 'date', 'time'
];

}

