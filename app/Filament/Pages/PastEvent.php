<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Event;

class PastEvent extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static string $view = 'filament.pages.pastevent';

    protected static ?string $navigationGroup = 'Gallery';
    protected static ?string $navigationLabel = 'Past Event';
    protected static ?int $navigationSort = 2;

    protected function getViewData(): array
    {
        return [
            'PastEvents' => Event::all(),
        ];
    }
}
