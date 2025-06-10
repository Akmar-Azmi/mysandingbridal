<?php
use Illuminate\Support\Facades\Route;

Route::middleware('web')
    ->prefix('admin')
    ->group(base_path('routes/admin.php'));


