<?php

use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget as BaseFullCalendarWidget;
use App\Models\Appointment;

class MyFullCalendarWidget extends BaseFullCalendarWidget
{
    protected function getEvents(): array
    {
        return Appointment::all()->map(fn ($appointment) => [
            'id' => $appointment->id,
            'title' => $appointment->title,
            'start' => $appointment->start,
            'end' => $appointment->end,
        ])->toArray();
    }
}

