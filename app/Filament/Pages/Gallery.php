<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Gallery extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static string $view = 'filament.pages.gallery';

    protected static ?int $navigationSort = 4;

    protected function getViewData(): array
{
    return [
        'PastEvents' => [
            ['id' => 1, 'name' => 'Buffet Ramadhan 2025', 'image' => 'https://placehold.co/200x200'],
            ['id' => 2, 'name' => 'Pelamin', 'image' => 'https://placehold.co/200x200'],
            ['id' => 3, 'name' => 'Majlis Hari Raya Perak', 'image' => 'https://placehold.co/200x200'],
            ['id' => 4, 'name' => 'Rumah Terbuka Perdana Menteri', 'image' => 'https://placehold.co/200x200'],
        ],
    ];
}
}
