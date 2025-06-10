<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminController;

// ========== GUEST ADMIN ROUTES ==========
Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// ========== AUTHENTICATED ADMIN ROUTES ==========
Route::middleware(['admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});
