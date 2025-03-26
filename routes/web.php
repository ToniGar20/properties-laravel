<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PropertyController;

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

//Home
use App\Http\Controllers\Frontend\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');

// Properties pages
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');
