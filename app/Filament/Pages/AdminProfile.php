<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class AdminProfile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Admin Profile';
    protected static ?string $navigationGroup = 'Setting'; // Group it!
    protected static string $view = 'filament.pages.admin-profile';
}

