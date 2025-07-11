<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Carbon\Carbon;

class AppointmentCalendarWidget extends FullCalendarWidget
{
    protected function getEvents(): array
    {
        return Appointment::all()->map(function ($a) {
            $start = Carbon::parse("{$a->appointment_date} {$a->appointment_time}");
            $end = $start->copy()->addHour();

            return [
                'title' => "{$a->name} - {$a->event_type}",
                'start' => $start->toIso8601String(),
                'end' => $end->toIso8601String(),
                'color' => '#93c5fd',
                'textColor' => '#000',
            ];
        })->toArray();
    }

    protected function getOptions(): array
    {
        return [
            'initialView' => 'timeGridWeek',
            'headerToolbar' => [
                'left' => 'prev,next today',
                'center' => 'title',
                'right' => 'dayGridMonth,timeGridWeek,timeGridDay',
            ],
            'height' => 700,
        ];
    }
}
