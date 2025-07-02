<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Services extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static string $view = 'filament.pages.services';

    protected static ?int $navigationSort = 3;
}
