<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyBenefit extends Model
{
    protected $table = 'why_benefits';

    protected $fillable = [
        'why_setting_id',
        'title',
        'description',
        'icon',
        'type',
        'sort_order',
    ];

    /**
     * Relationship: belongs to setting
     */
    public function setting()
    {
        return $this->belongsTo(WhySetting::class, 'why_setting_id');
    }
}