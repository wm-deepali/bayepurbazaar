<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    protected $fillable = [
        'title',
        'description',
        'stat_1',
        'stat_1_label',
        'stat_2',
        'stat_2_label',
        'stat_3',
        'stat_3_label',
        'image',
    ];
}