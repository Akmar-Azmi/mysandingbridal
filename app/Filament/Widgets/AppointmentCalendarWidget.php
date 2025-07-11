<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Carbon\Carbon;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class AppointmentCalendarWidget extends FullCalendarWidget
{
    protected function getEvents(): array
    {
        return Appointment::all()->map(function ($appointment) {
            $start = Carbon::parse($appointment->appointment_date . ' ' . $appointment->appointment_time)->toIso8601String();
            $end = Carbon::parse($appointment->appointment_date . ' ' . $appointment->appointment_time)->addHour()->toIso8601String();

            return [
                'title' => $appointment->event_type . ' - ' . $appointment->name,
                'start' => $start,
                'end'   => $end,
                'color' => '#4c8aed',
            ];
        })->toArray();

        dd($events);

    return $events;
    }
}
