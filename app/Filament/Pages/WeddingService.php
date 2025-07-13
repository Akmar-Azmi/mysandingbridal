<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\WedService;

class WeddingService extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Wedding Services';
    protected static ?string $navigationGroup = 'Services';
    protected static string $view = 'filament.pages.weddingservice';
    protected static ?int $navigationSort = -3;

    protected function getViewData(): array
{
    if (WedService::count() < 3) {
        $default = [
            'Wedding Packages',
            'Catering Packages',
            'Wedding Attire'
        ];

        foreach ($default as $name) {
            if (!WedService::where('name', $name)->exists()) {
                WedService::create([
                    'name' => $name,
                    'description' => null,
                    'image' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    return [
        'weddingServices' => WedService::orderBy('id')->get(),
    ];
}

}
