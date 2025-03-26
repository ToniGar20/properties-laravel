<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use RefineriaWeb\RWRealEstate\Models\Property as BaseProperty;

class Property extends BaseProperty
{
    use HasFactory;

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function type()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function features()
    {
        return $this->hasMany(PropertyFeature::class, 'property_id');
    }
}
