<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhySetting extends Model
{
    protected $table = 'why_settings';

    protected $fillable = [
        'hero_title',
        'hero_subtitle',

        'shopkeeper_title',
        'shopkeeper_description',

        'customer_title',
        'customer_description',

        'cta_title',
        'cta_description',
    ];

    /**
     * Relationship: Get all benefits
     */
    public function benefits()
    {
        return $this->hasMany(WhyBenefit::class, 'why_setting_id');
    }

    /**
     * Shopkeeper Benefits
     */
    public function shopkeeperBenefits()
    {
        return $this->hasMany(WhyBenefit::class, 'why_setting_id')
            ->where('type', 'shopkeeper')
            ->orderBy('sort_order');
    }

    /**
     * Customer Benefits
     */
    public function customerBenefits()
    {
        return $this->hasMany(WhyBenefit::class, 'why_setting_id')
            ->where('type', 'customer')
            ->orderBy('sort_order');
    }
}