<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PropertyController;

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

// Properties
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');
