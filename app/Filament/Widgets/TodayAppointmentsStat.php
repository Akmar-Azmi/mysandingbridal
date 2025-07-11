<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget;
use Illuminate\Support\Carbon;

class TodayAppointmentsStat extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Card::make(
                "Today's Appointments",
                Appointment::whereDate('appointment_date', Carbon::today())->count()
            ),
        ];
    }
}
