<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\AppointmentCalendarWidget;

class AdminDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public function getHeaderWidgets(): array
    {
        return [
            AppointmentCalendarWidget::class,
        ];
    }

    protected static string $view = 'filament.pages.admin-dashboard';

    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?int $navigationSort = 1; // makes it top item
}
