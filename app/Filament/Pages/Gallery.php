<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Gallery extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static string $view = 'filament.pages.gallery';

    protected static ?int $navigationSort = 4;
}
