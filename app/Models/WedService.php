<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WedService extends Model
{
    protected $table = 'wedding_services';
    protected $fillable = ['name', 'description', 'image'];
    public $timestamps = true;
}
