<?php

namespace App\Services;

use App\Models\Property;

class VisitCounterService
{
    public function register(Property $property): int
    {
        $sessionKey = 'viewed_properties_counts';
        $viewed = session()->get($sessionKey, []);

        $viewed[$property->id] = ($viewed[$property->id] ?? 0) + 1;
        session()->put($sessionKey, $viewed);

        $property->increment('visits');

        return $viewed[$property->id];
    }
}
