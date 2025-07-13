<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Illuminate\Support\Facades\Log;

class AppointmentCalendarWidget extends FullCalendarWidget
{
    public Model | string | null $model = Appointment::class;

    public function fetchEvents(array $fetchInfo): array
    {
        $appointments = Appointment::whereBetween('appointment_date', [$fetchInfo['start'], $fetchInfo['end']])->get();

        return $appointments->map(function (Appointment $appt) {
            $startDateTime = $appt->appointment_date . 'T' . $appt->appointment_time;

            $colorMap = [
                'Engagement' => '#da4a80',
                'Wedding' => '#c8a97e',
                'Birthday' => '#a3d9a5',
                'Meeting' => '#91c5f2',
                'Default' => '#cccccc',
            ];

            return [
                'id' => $appt->id,
                'title' => $appt->name . ' (' . $appt->event_type . ')',
                'start' => $startDateTime,
                'end' => $startDateTime,
                'color' => $colorMap[$appt->event_type] ?? $colorMap['Default'],
                'extendedProps' => [
                    'email'     => $appt->email,
                    'phone'     => $appt->phone,
                    'budget'    => $appt->budget,
                    'eventType' => $appt->event_type,
                    'notes'     => $appt->notes,
                    'date'      => $appt->appointment_date,
                    'time'      => $appt->appointment_time,
                ],
            ];
        })->toArray();
    }

    // ✅ Buang default modal
    protected function modalContent(array $event): string
    {
        return '';
    }

    // ✅ Buang create modal
    public function isCreateModalDisplayed(): bool
    {
        return true;
    }

    // ✅ Buang button "New appointment"
    protected function getHeaderToolbar(): ?array
    {
        return [
            'left'   => 'prev,next today',
            'center' => '', // ❌ Empty = no "New appointment" or title override
            'right'  => 'dayGridMonth,timeGridWeek,timeGridDay',
        ];
    }

    public static function canView(): bool
    {
        return true;
    }

    
}
