<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MandalMember extends Model
{
    protected $fillable = [
        'mandal_id',
        'name',
        'designation',
        'mobile',
        'whatsapp',
        'email',
        'status'
    ];

    public function mandal()
    {
        return $this->belongsTo(Mandal::class);
    }
}