<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeHero extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'button_text',
        'background_image'
    ];
}