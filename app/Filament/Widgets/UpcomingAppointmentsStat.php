<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget;
use Illuminate\Support\Carbon;

class UpcomingAppointmentsStat extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Card::make(
                'Upcoming Appointments',
                Appointment::where('appointment_date', '>', Carbon::today())->count()
            )
            ->description('Future bookings')
            ->icon('heroicon-o-calendar')
            ->color('warning'),
        ];
    }
}
