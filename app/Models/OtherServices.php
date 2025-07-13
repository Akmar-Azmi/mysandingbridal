<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherServices extends Model
{
    protected $table = 'other_services'; 
    protected $fillable = ['name', 'description', 'image'];
}
