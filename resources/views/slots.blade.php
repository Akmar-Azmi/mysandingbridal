@extends('layouts.base')

@section('content')

    {{-- Hero Banner --}}
    <section class="bg-gradient-to-l from-[#f6f5f0] to-[#f1e7e5] text-center py-12" data-aos="fade-up">
        <h1 class="text-4xl font-jacques font-semibold text-black mb-2">Available Slot</h1>
        <p class="text-lg italic text-black/80">
        Planning your big day? Use this page to check if your preferred wedding date is available!</p>
    </section>

<style>
    .calendar-day {
        aspect-ratio: 1 / 1;
        min-height: 70px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .calendar-day:hover {
        background-color: #da9837;
        transform: scale(1.02);
        cursor: pointer;
    }

    #calendar .fc-toolbar-title {
        font-family: 'Georgia', serif;
        font-size: 1.5rem;
        color: #8B5E3C;
    }

    .fc-daygrid-day-number {
        color: #444;
        font-weight: 500;
    }

    .fc-button {
        background-color: #80725d !important;
        border: none !important;
        color: #ffffff !important;
        font-weight: 600;
    }

    .fc-button:hover {
        background-color: #bea687 !important;
    }

    .fc-daygrid-day:hover {
    background-color: #e4d4c0 !important; /* soft blush from hero palette */
    transition: background-color 0.3s ease;
    cursor: pointer;
    }


    .fc {
        font-family: 'Poppins', sans-serif;
    }

    /* Fade and scale modal */
    .modal-enter {
        opacity: 0;
        transform: scale(0.95);
    }

    .modal-enter-active {
        opacity: 1;
        transform: scale(1);
        transition: all 0.3s ease;
    }

    .fade-in {
        animation: fadeIn 1s ease-in-out forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Page Wrapper -->
<div class="bg-[#ffffff] py-10">
    <div class="max-w-6xl mx-auto px-4 fade-in">

        <!-- Page Header & Description -->
        <div class="md:flex md:items-start md:justify-between mb-8 text-left">
            <div class="md:w-1/2">
                <h2 class="text-3xl font-jacques font-normal text-black mb-2">
                    Check Wedding Date Availability
                </h2>
                <p class="text-lg italic text-black/80">
                    Before booking an appointment, check if your desired wedding date is still available.
                </p>
            </div>
        </div>

        <!-- Calendar -->
        <div class="bg-gradient-to-l from-[#fffcf3] to-[#fffcf3] p-6 rounded-lg shadow-lg w-full max-w-6xl mx-auto transition duration-700 ease-in-out transform fade-in">
            <div id="calendar"></div>
        </div>

        <!-- Add spacing before footer -->
        <div class="mb-20"></div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');
        const modal = document.getElementById('slotModal');
        const modalCard = document.getElementById('modalCard');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: new Date(),
            headerToolbar: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            selectable: true,
        });

        calendar.render();

        // Fetch available slot dates and highlight them
    fetch('/api/slot-dates')
        .then(response => response.json())
        .then(slots => {
            const events = slots.map(slot => {
                return {
                    title: slot.available_slots + ' Slots',
                    start: slot.date,
                    backgroundColor: '#c8a97e',
                    borderColor: '#c8a97e'
                };
            });

            calendar.addEventSource(events);
        });

    });

</script>
