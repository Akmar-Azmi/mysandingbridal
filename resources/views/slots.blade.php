@extends('layouts.base')

@section('content')
<style>
    .calendar-day {
        aspect-ratio: 1 / 1;
        min-height: 70px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .calendar-day:hover {
        background-color: #FFF7EB; /* soft peach highlight */
        transform: scale(1.02);
        cursor: pointer;
    }

    #calendar .fc-toolbar-title {
        font-family: 'Georgia', serif;
        font-size: 1.5rem;
        color: #8B5E3C; /* chocolate brown */
    }

    .fc-daygrid-day-number {
        color: #444;
        font-weight: 500;
    }

    .fc-button {
        background-color: #FCD34D !important;
        border: none !important;
        color: #4B3E2E !important;
        font-weight: 600;
    }

    .fc-button:hover {
        background-color: #FBBF24 !important;
    }

    .fc {
        font-family: 'Poppins', sans-serif;
    }
</style>

<!-- Page Wrapper -->
<div class="bg-[#FFFAF0] py-10">
    <div class="max-w-6xl mx-auto px-4">

        <!-- Page Header & Description -->
        <div class="md:flex md:items-start md:justify-between mb-8">
            <div class="md:w-1/2">
                <h2 class="font-bold text-2xl md:text-4xl text-[#1f150e] tracking-wide leading-snug"
                    style="font-family: 'Inria Serif', serif; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.15);">
                    Check Wedding Date Availability</h2>
                <p class="text-sm text-gray-600 mt-2" style="font-family: 'Inika', serif;">
                    Planning your big day? Use this page to check if your preferred wedding date is available!
                </p>
                <p class="text-sm text-gray-600" style="font-family: 'Inika', serif;">
                    Before booking an appointment, check if your desired wedding date is still available.
                </p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-6xl mx-auto">
            <div id="calendar"></div>
        </div>

        <!-- Slot Info Popup -->
        <div id="slotModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 hidden">
            <div class="bg-white rounded-2xl shadow-2xl p-8 text-center max-w-xs border border-yellow-300">
                <h3 id="slotDate" class="font-semibold text-lg mb-4 text-[#8B5E3C]"></h3>
                <p id="slotCount" class="text-xl text-gray-600 italic">2 Slot Available</p>
                <button onclick="closeSlotModal()" class="mt-6 px-5 py-2 bg-yellow-500 text-white rounded-full hover:bg-yellow-600 transition-all duration-200 shadow-md">
                    Close
                </button>
            </div>
        </div>

        <!-- Add spacing before footer -->
        <div class="mb-20"></div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: '2025-05-01',
            headerToolbar: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            selectable: true,
            dateClick: function (info) {
                const clickedDate = new Date(info.dateStr);
                const options = { day: 'numeric', month: 'long', year: 'numeric', weekday: 'long' };
                const formattedDate = clickedDate.toLocaleDateString('en-GB', options);

                // Set the date in the modal
                document.getElementById('slotDate').innerText = formattedDate;

                // ✅ This is your placeholder for dynamic data
                fetch('/api/slot-count?date=' + info.dateStr)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('slotCount').innerText = data.slots + ' Slot Available';
                    })
                    .catch(() => {
                        document.getElementById('slotCount').innerText = 'Unable to fetch slots';
                    });

                // Show the modal
                document.getElementById('slotModal').classList.remove('hidden');
            }
        });

        calendar.render();
    });

    function closeSlotModal() {
        document.getElementById('slotModal').classList.add('hidden');
    }
</script>
