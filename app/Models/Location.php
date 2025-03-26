<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use RefineriaWeb\RWRealEstate\Models\Location as BaseLocation;

class Location extends BaseLocation
{
    use HasFactory;

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
