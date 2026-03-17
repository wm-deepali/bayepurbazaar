<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'location_id',
        'category_id',
        'sub_category_id',
        'business_name',
        'address',
        'mobile',
        'email',
        'whatsapp',
        'short_description',
        'services',
        'working_hours',
        'closed_days',
        'website',
        'logo',
        'image',
        'status'
    ];

    protected $casts = [
        'closed_days' => 'array'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
}