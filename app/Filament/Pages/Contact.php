<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Contact extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-phone';

    protected static string $view = 'filament.pages.contact';

    protected static ?int $navigationSort = 7;
}
