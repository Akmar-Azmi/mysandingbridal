<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Clients extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static string $view = 'filament.pages.clients';

    protected static ?int $navigationSort = 5;
}
