<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mandal extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    public function members()
    {
        return $this->hasMany(MandalMember::class);
    }
}