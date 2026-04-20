<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MandalMember extends Model
{
    protected $fillable = [
        'mandal_id',
        'mandal_category_id',

        // ✅ OLD (unchanged)
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

        // ✅ NEW (added)
        'father_name',
        'gender',
        'code',
        'address',
        'experience',
        'suggestion',
        'state_id',
        'city_id',
        'pin_code',

        'status'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // ✅ Mandal
    public function mandal()
    {
        return $this->belongsTo(Mandal::class);
    }

    // ✅ Mandal Category
    public function category()
    {
        return $this->belongsTo(MandalCategory::class, 'mandal_category_id');
    }

    // ✅ State
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    // ✅ City
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}