<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mandal extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status',
        'mandal_category_id' // ADD THIS
    ];

    public function category()
    {
        return $this->belongsTo(MandalCategory::class, 'mandal_category_id');
    }

    public function members()
    {
        return $this->hasMany(MandalMember::class);
    }
}