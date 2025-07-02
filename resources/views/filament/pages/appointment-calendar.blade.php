<x-filament::page>
    <div class="bg-[#FFFBF1] p-6 rounded-lg shadow max-w-6xl mx-auto">
        <h2 class="text-2xl font-semibold mb-2 text-center">Upcoming Appointment Booking</h2>

        <div class="mt-6 border border-gray-200 rounded-xl overflow-hidden p-4 bg-white shadow-md">
            <div id="calendar" class="custom-calendar text-sm"></div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const calendarEl = document.getElementById('calendar');

                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    height: 'auto',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    events: @json($this->getEvents()),
                    dayMaxEventRows: 2,
                    fixedWeekCount: false,
                });

                calendar.render();
            });
        </script>
    @endpush

    @push('styles')
        <style>
            /* Make calendar smaller and styled like your design */
            .custom-calendar .fc {
                font-size: 14px;
            }

            .custom-calendar .fc-toolbar-title {
                font-size: 1.5rem;
                font-weight: bold;
                text-align: center;
            }

            .custom-calendar .fc-button {
                background-color: #F6B83D !important;
                border: none;
                color: white !important;
                padding: 0.3rem 0.8rem;
                border-radius: 6px;
                font-size: 0.8rem;
            }

            .custom-calendar .fc-button:hover {
                background-color: #e6a92b !important;
            }

            .custom-calendar .fc-daygrid-day-number {
                font-weight: 600;
            }

            .custom-calendar .fc-event {
                font-size: 12px;
                padding: 2px 4px;
                background-color: #F6B83D;
                border: none;
                color: white;
                border-radius: 3px;
            }

            .custom-calendar .fc-col-header-cell-cushion {
                color: #F6B83D;
                font-weight: 600;
            }
        </style>
    @endpush
</x-filament::page>
