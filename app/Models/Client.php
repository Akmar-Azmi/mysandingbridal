<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // Optional: specify table if not default
    // protected $table = 'clients';

    protected $fillable = [
        'name',
        'feedback',
        'theme',
        'venue',
        'image',
        'is_visible',
    ];
}
