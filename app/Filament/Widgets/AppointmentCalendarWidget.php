<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Notifications\Notification;

class AppointmentCalendarWidget extends FullCalendarWidget
{
    public Model | string | null $model = Appointment::class;

    public function fetchEvents(array $fetchInfo): array
    {
        return Appointment::whereBetween('appointment_date', [$fetchInfo['start'], $fetchInfo['end']])
            ->get()
            ->map(function (Appointment $appt) {
                $startDateTime = $appt->appointment_date . 'T' . $appt->appointment_time;

                return [
                    'id'    => $appt->id,
                    'title' => $appt->name . ' (' . $appt->event_type . ')',
                    'start' => $startDateTime,
                    'end'   => $startDateTime,
                    'color' => '#da4a80',
                    'extendedProps' => [
                        'email'     => $appt->email,
                        'phone'     => $appt->phone,
                        'eventType' => $appt->event_type,
                        'notes'     => $appt->notes,
                    ],
                ];
            })
            ->toArray();
    }

    protected function modalContent(array $event): string
    {
        $appointment = \App\Models\Appointment::find($event['id']);

        if (!$appointment) {
            \Log::error('Appointment not found', ['id' => $event['id']]);
            return "<p class='text-red-600'>Appointment not found (ID: {$event['id']})</p>";
        }

        return view('calendar.appointment-modal', [
            'appointment' => $appointment,
        ])->render();
    }



    protected function modalFormSchema(): array
    {
        return [
            TextInput::make('name')->required(),
            TextInput::make('email')->email(),
            TextInput::make('phone')->tel(),
            TextInput::make('event_type')->label('Event Type')->required(),
            TextInput::make('budget')->numeric()->minValue(0),
            DatePicker::make('appointment_date')->required(),
            TimePicker::make('appointment_time')->required(),
            Textarea::make('notes')->rows(3)->label('Special Notes'),
        ];
    }

    protected function onCreateEvent(array $data): ?Model
    {
        $appt = Appointment::create($data);

        Notification::make()
            ->title('New Appointment Added')
            ->success()
            ->send();

        return $appt;
    }

    protected function onUpdateEvent(Model $record, array $data): Model
    {
        $record->update($data);

        Notification::make()
            ->title('Appointment Updated')
            ->success()
            ->send();

        return $record;
    }

    protected function onDeleteEvent(Model $record): void
    {
        $record->delete();

        Notification::make()
            ->title('Appointment Deleted')
            ->success()
            ->send();
    }

    public static function canView(): bool
    {
        return true;
    }
}
