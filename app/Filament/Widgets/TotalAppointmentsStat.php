<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget;

class TotalAppointmentsStat extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Appointments', Appointment::count())
            ->description('All-time total')
            ->icon('heroicon-o-clipboard-document-check')
            ->color('success'),

        ];
    }
}
