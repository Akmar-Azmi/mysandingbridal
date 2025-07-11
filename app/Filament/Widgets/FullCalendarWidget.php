<?php

namespace App\Filament\Widgets;

use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget as BaseFullCalendarWidget;
use App\Models\Appointment;

class FullCalendarWidget extends BaseFullCalendarWidget
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
