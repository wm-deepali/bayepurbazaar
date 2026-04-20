<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MandalCategory extends Model
{
    protected $fillable = ['name', 'status'];

    public function mandals()
    {
        return $this->hasMany(Mandal::class);
    }
}
