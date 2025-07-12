<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'whatsapp_number',
        'email',
        'address',
        'open_time',
        'close_time',
        'location_embed',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (! $model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}