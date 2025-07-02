<?php

namespace App\Filament\Widgets;

use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use App\Models\Appointment;
use Illuminate\Support\Collection;
use Saade\FilamentFullCalendar\FullCalendarPlugin;

class AppointmentCalendarWidget extends FullCalendarWidget
{
    protected static ?string $heading = 'Appointment Calendar';

    public function getEvents(): array
    {
        return Appointment::all()->map(function ($appointment) {
            return [
                'id' => $appointment->id,
                'title' => $appointment->title,
                'start' => $appointment->start_time,
                'end' => $appointment->end_time,
            ];
        })->toArray();
    }
    
}
