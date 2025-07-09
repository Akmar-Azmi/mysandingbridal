@extends('layouts.base')

@section('content')
<style>
    .calendar-day {
        aspect-ratio: 1 / 1;
        min-height: 70px;
    }
</style>

<!-- Page Wrapper -->
<div class="bg-[#FFFAF0] py-10">
    <div class="max-w-6xl mx-auto px-4">

        <!-- Page Header & Description -->
        <div class="md:flex md:items-start md:justify-between mb-8">
            <div class="md:w-1/2">
                <h2 class="font-bold text-xl md:text-2xl">Check Wedding Date Availability</h2>
                <p class="text-sm text-gray-600 mt-2">
                    Planning your big day? Use this page to check if your preferred wedding date is available!
                </p>
                <p class="text-sm text-gray-600">
                    Before booking an appointment, check if your desired wedding date is still available.
                </p>
            </div>
        </div>

        <!-- Calendar Box Centered and Wider -->
        <div class="flex justify-center">
            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-6xl">

                <!-- Month Navigation -->
                <div class="flex justify-between items-center mb-4">
                    <button class="text-xl font-bold">&larr;</button>
                    <h3 class="text-lg font-semibold uppercase tracking-wide">May 2025</h3>
                    <button class="text-xl font-bold">&rarr;</button>
                </div>

                <!-- Calendar Grid -->
                <div class="grid grid-cols-7 gap-[1px] bg-gray-300 rounded overflow-hidden">
                    @php
                        $days = ['Mo', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                    @endphp

                    @foreach ($days as $day)
                        <div class="bg-white text-center font-semibold text-yellow-600 py-2 border calendar-day">
                            {{ $day }}
                        </div>
                    @endforeach

                    @for ($i = 1; $i <= 31 + 3; $i++)
                        @php
                            $dayNum = $i - 3;
                        @endphp
                        <div class="bg-white text-center text-gray-800 border calendar-day">
                            {{ $dayNum > 0 && $dayNum <= 31 ? $dayNum : '' }}
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add spacing before footer -->
<div class="mb-20"></div>
@endsection
