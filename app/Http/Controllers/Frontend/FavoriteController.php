<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Events\PropertyFavorited;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store($id, Request $request)
    {
        $property = Property::with('agent')->findOrFail($id);

        $favorites = session()->get('favorite_properties', []);
        if (!in_array($id, $favorites)) {
            $favorites[] = $id;
            session()->put('favorite_properties', $favorites);

            event(new PropertyFavorited($property));
        }

        return back()->with('success', 'Propiedad añadida a favoritos.');
    }
}
