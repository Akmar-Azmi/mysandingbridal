<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class WeddingService extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Wedding Services';
    protected static ?string $navigationGroup = 'Services';
    protected static string $view = 'filament.pages.weddingservice';
    protected static ?int $navigationSort = -3;


    // ✅ Add this method to pass $services to Blade
   protected function getViewData(): array
{
    return [
        'weddingServices' => [
            ['id' => 1, 'name' => 'Wedding Packages', 'image' => 'https://placehold.co/200x200'],
            ['id' => 2, 'name' => 'Catering Packages', 'image' => 'https://placehold.co/200x200'],
            ['id' => 3, 'name' => 'Wedding Attire', 'image' => 'https://placehold.co/200x200'],
            ['id' => 4, 'name' => 'Emcee & Entertainment', 'image' => 'https://placehold.co/200x200'],
        ],
        'otherServices' => [
            ['id' => 1, 'name' => 'Ramadhan Buffet', 'image' => 'https://placehold.co/200x200'],
            ['id' => 2, 'name' => 'Engagement', 'image' => 'https://placehold.co/200x200'],
            ['id' => 3, 'name' => 'Aqeeqah', 'image' => 'https://placehold.co/200x200'],
            ['id' => 4, 'name' => 'Party', 'image' => 'https://placehold.co/200x200'],
        ],
    ];
}

}
