<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\WeddingServiceController;

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

// Redirect /admin to your custom calendar/dashboard page
Route::redirect('/admin', '/admin/admin-dashboard');

// Dashboard
Route::get('/dashboard', fn () => redirect()->route('filament.admin.pages.dashboard'))->name('dashboard');

// Admin Profile
Route::get('/about', fn () => redirect()->route('filament.admin.pages.about'))->name('about');

// Admin Team Form
Route::get('/admin/team/form', fn () => view('team-form'))->name('team.form');

//Appointments
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

// Admin Wedding Services (CRUD)
Route::prefix('admin/services')->name('admin.services.')->group(function () {
    Route::get('/wedding-services', [WeddingServiceController::class, 'index'])->name('wedding-services.index');
    Route::post('/wedding-services/store', [WeddingServiceController::class, 'store'])->name('wedding-services.store');
    Route::get('/wedding-services/{id}/edit', [WeddingServiceController::class, 'edit'])->name('wedding-services.edit');
    Route::put('/wedding-services/{id}', [WeddingServiceController::class, 'update'])->name('wedding-services.update');
    Route::delete('/wedding-services/{id}', [WeddingServiceController::class, 'destroy'])->name('wedding-services.destroy');
});


/*
|--------------------------------------------------------------------------
| APPOINTMENT ROUTES
|--------------------------------------------------------------------------
*/

// Quick appointment from homepage
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

// Multi-step booking form
Route::get('/book', fn () => view('book'))->name('book');
Route::post('/book', [AppointmentController::class, 'submit'])->name('appointment.submit');

/*
|--------------------------------------------------------------------------
| USER-SIDE PUBLIC PAGES
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/gallery', 'gallery')->name('gallery');
Route::view('/clients', 'clients')->name('clients');
Route::view('/slots', 'slots')->name('slots');
Route::view('/contact', 'contact')->name('contact');
