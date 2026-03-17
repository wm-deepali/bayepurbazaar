<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MandalMember extends Model
{

    protected $fillable = [
        'mandal_id',
        'photo',
        'name',
        'designation',
        'location',
        'since',
        'mobile',
        'whatsapp',
        'email',
        'relation',
        'contribution',
        'message',
        'status'
    ];

    public function mandal()
    {
        return $this->belongsTo(Mandal::class);
    }
}