<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyFilteredController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with(['agent', 'location', 'type', 'features']);

        if ($request->filled('type_id')) {
            $query->where('property_type_id', $request->type_id);
        }

        if ($request->filled('location_id')) {
            $query->where('location_id', $request->location_id);
        }

        if ($request->filled('agent_id')) {
            $query->where('agent_id', $request->agent_id);
        }

        $properties = $query->get();

        return response()->json($properties);
    }
}
