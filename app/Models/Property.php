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
        return $this->belongsTo(PropertyType::class, 'properties_type_id');
    }

    public function features()
    {
        return $this->hasMany(PropertyFeature::class, 'property_id');
    }

    public function similarProperties()
    {
        $mainFeature = $this->features->first();
        if (!$mainFeature) return collect();

        $price = (float) $mainFeature->price;
        $bedrooms = $mainFeature->bedrooms;

        return self::where('id', '!=', $this->id)
            ->where('location_id', $this->location_id)
            ->where('properties_type_id', $this->properties_type_id)
            ->whereHas('features', function ($query) use ($price, $bedrooms) {
                $query
                // ->where('price', '>=', $price - 10000)
                // ->where('price', '<=', $price + 10000)
                ->where('bedrooms', $bedrooms);
            })
            ->with(['location', 'type', 'agent', 'features'])
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }
}
