<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Slots extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $title = 'Available Slots';
    protected static ?string $navigationLabel = 'Available Slots';
    protected static ?int $navigationSort = 6;

    protected static string $view = 'filament.pages.slots';

    public $date;

    public function mount(): void
    {
        $year = request()->input('year', now()->year);
        $month = request()->input('month', now()->month);
        $this->date = Carbon::createFromDate($year, $month, 1);
    }

    public function getViewData(): array
    {
        return [
            'date' => $this->date,
        ];
    }
}
