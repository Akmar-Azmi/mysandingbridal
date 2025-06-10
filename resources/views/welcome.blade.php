<?php

use Illuminate\Support\Facades\Route;

// ===================
// USER-SIDE PUBLIC PAGES (No Auth)
// ===================

// Home Page
Route::view('/', 'home')->name('home');

// About Us Page
Route::view('/about', 'about')->name('about');

// Services Page
Route::view('/services', 'services')->name('services');

// Gallery Page
Route::view('/gallery', 'gallery')->name('gallery');

// Our Clients Page
Route::view('/clients', 'clients')->name('clients');

// Available Slot Page
Route::view('/slots', 'slots')->name('slots');

// Contact Us Page
Route::view('/contact', 'contact')->name('contact');

// Book Appointment (optional)
Route::view('/book', 'book')->name('book');
