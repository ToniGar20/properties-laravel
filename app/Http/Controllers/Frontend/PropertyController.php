<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with(['agent', 'location', 'type', 'features'])->get();
        return view('frontend.properties.index', compact('properties'));
    }

    public function show($id)
    {
        $property = Property::with(['agent', 'location', 'type', 'features'])->findOrFail($id);
        return view('frontend.properties.show', compact('property'));
    }
}
