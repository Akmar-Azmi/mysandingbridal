<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries'; // Match Supabase table
    protected $fillable = ['url', 'is_visible'];
}
