<?php

use Illuminate\Support\Facades\Route;

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
