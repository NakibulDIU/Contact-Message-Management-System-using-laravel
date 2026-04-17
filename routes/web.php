<?php

use Illuminate\Support\Facades\Route;

// From PageController
use App\Http\Controllers\PageController;   // উপরে যোগ করো


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Assalamualaikum! This is my first custom route.';
});

Route::get('/mvc-test', function(){
    return 'এটা MVC test route। Controller এখনো বানাইনি।';
});


// 1. Simple GET Route
Route::get('/hello', function () {
    return 'Assalamualaikum! Welcome to Laravel.';
});

// 2. Route with parameter (dynamic)
Route::get('/user/{name}', function ($name) {
    return "তোমার নাম: " . $name .".";
});

// Exercise 
Route::get('/greet',function(){
    return 'হ্যালো ব্রাদার! এটা আমার প্রথম রাউট।';
});

// 3. Route that returns a view
Route::get('/welcome', function () {
    return view('welcome');
});

//PageController
Route::get('/home', [PageController::class, 'home']);
Route::get('/about',[PageController::class, 'about']);
Route::get('/greeting',[PageController::class, 'greeting']);

// Form Handling and CSRF Protection

Route::get('/contact', [PageController::class, 'showContact']);
Route::post('/submit-contact', [PageController::class, 'submitContact']);

// Delete 
Route::delete('/contact/{id}', [PageController::class, 'destroy'])->name('contact.destroy');

//Edit
// Edit form দেখানো
Route::get('/contact/{id}/edit', [PageController::class, 'edit'])->name('contact.edit');

// Update করা
Route::put('/contact/{id}', [PageController::class, 'update'])->name('contact.update');