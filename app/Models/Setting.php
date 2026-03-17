<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [

        'address',
        'phone',
        'support_phone',
        'email',
        'support_email',
        'facebook',
        'instagram',
        'twitter',
        'whatsapp',
        'google_map'

    ];
}