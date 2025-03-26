<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $locationId = $request->input('location_id');

        $query = \App\Models\Property::query()
            ->join('properties_features', 'properties.id', '=', 'properties_features.property_id')
            ->with(['location', 'type', 'agent', 'features'])
            ->orderBy('properties_features.price', 'desc')
            ->select('properties.*', 'properties_features.price as feature_price');
    
        if ($locationId) {
            $query->where('properties.location_id', $locationId);
        }
    
        $properties = $query->paginate(20);
        $locations = \App\Models\Location::orderBy('name')->get();
    
        return view('frontend.properties.index', compact('properties', 'locations', 'locationId'));
    }
    

    public function show($id)
    {
        $property = Property::with(['agent', 'location', 'type', 'features'])->findOrFail($id);
        return view('frontend.properties.show', compact('property'));
    }
}
