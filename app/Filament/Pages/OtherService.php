<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\OtherServices;

class OtherService extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Other Services';
    protected static ?string $navigationGroup = 'Services';
    protected static string $view = 'filament.pages.otherservice';

   protected function getViewData(): array
{
    return [
        'otherServices' => OtherServices::all(), 
    ];
}

}
