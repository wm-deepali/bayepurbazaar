<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'menu_name',
        'slug',
        'meta_title',
        'meta_description',
        'content',
        'status',
        'show_in_menu',
    ];
}