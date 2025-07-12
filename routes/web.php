<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\WeddingServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PublicClientController;
use App\Http\Controllers\UserGalleryController;
use App\Http\Controllers\AdminGalleryController;

use App\Http\Controllers\ContactController;
USE App\Filament\Pages\Contact;


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

// Redirect /admin to your custom calendar/dashboard page
Route::redirect('/admin', '/admin/admin-dashboard');

// Dashboard
Route::get('/dashboard', fn () => redirect()->route('filament.admin.admin.dashboard'))->name('dashboard');

// Admin Profile
Route::get('/about', fn () => redirect()->route('filament.admin.admin.about'))->name('about');

Route::get('/contact', fn () => redirect()->route('filament.admin.contact'))->name('contact');
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

// Admin/Team routes
Route::post('/admin/teams', [TeamController::class, 'store'])->name('teams.store');
Route::put('/admin/teams/{id}', [TeamController::class, 'update'])->name('teams.update');
Route::delete('/admin/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
Route::get('/admin/teams', function () {$teams = \App\Models\Team::all();return view('admin.teams.index', compact('teams'));})->name('teams.index');

//Admin Profile 
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [App\Http\Controllers\AdminProfileController::class, 'edit'])->name('admin.profile');
    Route::post('/admin/profile', [App\Http\Controllers\AdminProfileController::class, 'update'])->name('admin.profile.update');
});


//Admin Clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::post('/admin/clients/store', [\App\Http\Controllers\ClientController::class, 'store'])->name('clients.store');
Route::get('/admin/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/admin/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/admin/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

//admin contact
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/contact', [ContactController::class, 'edit'])->name('admin.contact.edit');
    Route::post('/contact', [ContactController::class, 'update'])->name('admin.contact.update');
});




//declare in contact
Route::get('/admin/contact', Contact::class)->name('filament.admin.pages.contact');

//admin side contact to user side
Route::get('/contact', [ContactController::class, 'showUserContact'])->name('contact');
//client (admin to user side)
Route::get('/clients', [PublicClientController::class, 'index'])->name('clients');



//Admin About (TEAM) 
Route::get('/about', [PageController::class, 'about'])->name('about');


// Admin Gallery (Events)
// Admin Gallery (Events)
Route::get('/', [EventController::class, 'index' ])->name('events. index');
Route::post('/', [EventController::class, 'store'])->name('events.store');
Route::delete('/{id}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/{id}',[EventController::class, 'update'])->name('events. update');



Route::prefix('admin/gallery')->group(function () {
    Route::put('/{id}', [EventController::class, 'update'])->name('events.update');
});

// Admin GalleryPhotos
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/galleryphoto', [AdminGalleryController::class, 'index'])->name('gallery.index');
    Route::post('/galleryphoto', [AdminGalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/galleryphoto/{gallery}', [AdminGalleryController::class, 'destroy'])->name('gallery.destroy');  
});
Route::delete('/admin/gallery-photo/{id}', [AdminGalleryController::class, 'destroy'])->name('admin.gallery.destroy');





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
| USER-SIDE PUBLIC admin
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');

Route::view('/services', 'services')->name('services');
Route::view('/gallery', 'gallery')->name('gallery');

Route::view('/slots', 'slots')->name('slots');
Route::get('/contact', [ContactController::class, 'showUserContact'])->name('contact');

// User Gallery
Route::get('/gallery', [UserGalleryController::class, 'index'])->name('gallery');




