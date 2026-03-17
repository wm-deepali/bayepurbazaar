<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model
{
    protected $table = 'about_settings';

    protected $fillable = [
        'hero_title',
        'hero_subtitle',

        'about_title',
        'about_image',
        'about_description',

        'vision',
        'mission',
        'objectives',

        'founder_name',
        'founder_description',
        'founder_quote',
        'founder_image',

        'linkedin',
        'instagram',
        'whatsapp',

        'cta_title',
        'cta_description',
    ];

    /**
     * Optional: Always get single row (settings pattern)
     */
    public static function getData()
    {
        return self::first();
    }
}