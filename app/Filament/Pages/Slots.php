<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Slots extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static string $view = 'filament.pages.slots';

    protected static ?int $navigationSort = 6;
}
