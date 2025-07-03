<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;

Route::get('/book', fn() => view('book'))->name('book');
Route::post('/book', [AppointmentController::class, 'submit'])->name('appointment.submit');


Route::get('/dashboard', function () {
    return redirect()->route('filament.admin.pages.dashboard');
})->name('dashboard');


// ========================
// USER-SIDE PUBLIC ROUTES
// ========================

// Homepage
Route::view('/', 'home')->name('home');

// About Us
Route::view('/about', 'about')->name('about');

// Services
Route::view('/services', 'services')->name('services');

// Gallery
Route::view('/gallery', 'gallery')->name('gallery');

// Our Clients
Route::view('/clients', 'clients')->name('clients');

// Available Slot
Route::view('/slots', 'slots')->name('slots');

// Contact Us
Route::view('/contact', 'contact')->name('contact');

// Book Appointment
Route::view('/book', 'book')->name('book');
