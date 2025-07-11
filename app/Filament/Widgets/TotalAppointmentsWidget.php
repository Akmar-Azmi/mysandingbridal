<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget;

class TotalAppointmentsWidget extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Appointments', Appointment::count()),
        ];
    }

    // Optional: Set width if used alongside calendar
    protected int | string | array $columnSpan = 4;
}
