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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\ContactController;
use App\Filament\Pages\Contact;

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

// Redirect /admin to your custom dashboard
Route::redirect('/admin', '/admin/admin-dashboard');

// Dashboard
Route::get('/dashboard', fn () => redirect()->route('filament.admin.admin.dashboard'))->name('dashboard');


// Admin Profile
Route::get('/about', fn () => redirect()->route('filament.admin.admin.about'))->name('about');

//Admin Contact
Route::get('/contact', fn () => redirect()->route('filament.admin.contact'))->name('contact');


// Admin Team Form
Route::get('/admin/team/form', fn () => view('team-form'))->name('team.form');

// Appointments
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

// Admin Team
Route::prefix('admin')->group(function () {
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::put('/teams/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
    Route::get('/teams', function () {
        $teams = \App\Models\Team::all();
        return view('admin.teams.index', compact('teams'));
    })->name('teams.index');
});

// Admin Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile');
    Route::post('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::post('/admin/profile/password', [AdminProfileController::class, 'updatePassword'])->name('admin.profile.password.update');
});

// Admin Clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::post('/admin/clients/store', [ClientController::class, 'store'])->name('clients.store');
Route::get('/admin/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/admin/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/admin/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

// Admin Contact
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/contact', [ContactController::class, 'edit'])->name('admin.contact.edit');
    Route::post('/contact', [ContactController::class, 'update'])->name('admin.contact.update');
});







// Filament Custom Page Route
Route::get('/admin/contact', Contact::class)->name('filament.admin.pages.contact');

// Admin-to-user contact view
Route::get('/contact', [ContactController::class, 'showUserContact'])->name('contact');


//client (admin to user side)
Route::get('/clients', [PublicClientController::class, 'index'])->name('clients');


//Admin About (TEAM) 
Route::get('/about', [PageController::class, 'about'])->name('about');


// Admin Gallery (Events)
// Admin Gallery (Events)
Route::prefix('admin/past-event')->group(function () {
Route::get('/', [EventController::class, 'index' ])->name('events. index');
Route::post('/', [EventController::class, 'store'])->name('events.store');
Route::delete('/{id}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/{id}',[EventController::class, 'update'])->name('events. update');
});


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




// Admin Event Routes (Past Events)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/pastevent', [EventController::class, 'index'])->name('events.index');
    Route::post('/pastevent', [EventController::class, 'store'])->name('events.store');
    Route::put('/pastevent/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/pastevent/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});

// Admin Gallery (Edit event if needed in gallery)
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




// Admin Event Routes (Past Events)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/pastevent', [EventController::class, 'index'])->name('events.index');
    Route::post('/pastevent', [EventController::class, 'store'])->name('events.store');
    Route::put('/pastevent/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/pastevent/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});

// Admin Gallery (Edit event if needed in gallery)
Route::prefix('admin/gallery')->group(function () {
    Route::put('/{id}', [EventController::class, 'update'])->name('events.update');
});

// Admin Gallery Photos
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

Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
Route::get('/book', fn () => view('book'))->name('book');
Route::post('/book', [AppointmentController::class, 'submit'])->name('appointment.submit');

/*
|--------------------------------------------------------------------------
| USER-SIDE PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');
Route::view('/services', 'services')->name('services');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery'); // ✅ This is the correct gallery route
Route::view('/slots', 'slots')->name('slots');

// ⚠️ Removed this conflicting route:
// Route::get('/gallery', [UserGalleryController::class, 'index'])->name('gallery');
