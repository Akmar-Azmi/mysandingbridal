<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Gallery;

class GalleryPhoto extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static string $view = 'filament.pages.galleryphoto';
    protected static ?string $navigationGroup = 'Gallery';
    protected static ?int $navigationSort = 4;

    public $images;

    public function mount(): void
    {
        $this->images = Gallery::all();
    }

    protected function getViewData(): array
    {
        return [
            'images' => $this->images,
        ];
    }
    //protected static ?int $navigationSort = 1;
    //protected static ?string $navigationGroup = 'Gallery';
    //protected static ?string $navigationLabel = 'Gallery Photo';

}

