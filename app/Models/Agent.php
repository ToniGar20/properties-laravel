<?php

namespace App\Models;

use RefineriaWeb\RWRealEstate\Models\Agent as BaseAgent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agent extends BaseAgent
{
    use HasFactory;

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
