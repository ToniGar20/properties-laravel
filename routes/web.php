<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home-test-view', function () {
    return view('vendor.rw-real-estate.home');
});

Route::get('/properties-test-view', function () {
    return view('vendor.rw-real-estate.properties');
});

Route::get('/test-models', function () {
    $property = \App\Models\Property::with(['agent', 'location', 'type', 'features'])->first();
    return response()->json($property);
});