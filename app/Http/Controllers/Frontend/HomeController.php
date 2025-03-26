<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::with(['location'])->inRandomOrder()->limit(10)->get();
        return view('frontend.home', compact('properties'));
    }
}
