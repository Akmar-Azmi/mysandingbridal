<?php
use Illuminate\Support\Facades\Route;

Route::middleware('web')
    ->group(base_path('routes/web.php'));



