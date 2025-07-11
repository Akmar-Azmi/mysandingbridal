<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingService extends Model
{
    // Allow mass assignment on these fields
    protected $fillable = [
        'name',
        'description',
        'image',
    ];
}
