<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use RefineriaWeb\RWRealEstate\Models\PropertyFeature as BasePropertyFeature;

class PropertyFeature extends BasePropertyFeature
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
