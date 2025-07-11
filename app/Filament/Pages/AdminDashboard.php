<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\TotalAppointmentsWidget;
use App\Filament\Widgets\AppointmentCalendarWidget;

class AdminDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?int $navigationSort = 1;

    // ✅ This is the route slug (important!)
    protected static ?string $slug = 'admin-dashboard';

    // ✅ This is the Blade file
    protected static string $view = 'filament.pages.admin-dashboard';
}
