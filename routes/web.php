<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;

// Home page
Route::get('/', function () {
    return redirect()->route('contacts.index');
});

// Resource Route (সবচেয়ে important)
Route::resource('contacts', ContactController::class);

// PageController এর greeting route (যদি রাখতে চাও)
Route::get('/greeting', [PageController::class, 'greeting']);