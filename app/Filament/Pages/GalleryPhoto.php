<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class GalleryPhoto extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static string $view = 'filament.pages.galleryphoto';

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Gallery';
    protected static ?string $navigationLabel = 'Gallery Photo';

}
