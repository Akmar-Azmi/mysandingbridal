@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-xl font-semibold mb-2">Upcoming Appointment Booking</h2>

    {{-- Month Header --}}
    <div class="flex items-center justify-between text-center mt-4 mb-2">
        <button class="text-yellow-600 text-2xl font-bold">←</button>
        <h3 class="text-lg font-bold text-gray-800">MAY 2025</h3>
        <button class="text-yellow-600 text-2xl font-bold">→</button>
    </div>

    {{-- Calendar + Time Slots --}}
    <div class="grid grid-cols-3 gap-6">
        {{-- Calendar (left 2/3) --}}
        <div class="col-span-2">
            <div class="grid grid-cols-7 gap-2 text-center text-yellow-600 font-semibold mb-2">
                <div>Mo</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div><div>Sun</div>
            </div>
            <div class="grid grid-cols-7 gap-2 text-center bg-white p-4 rounded border">
                @for ($i = 1; $i <= 31; $i++)
                    <div class="py-4 border rounded {{ $i === 24 ? 'relative bg-yellow-100' : '' }}">
                        {{ $i }}
                        @if ($i === 24)
                            <span class="absolute bottom-1 left-1/2 transform -translate-x-1/2 flex space-x-1">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                            </span>
                        @endif
                    </div>
                @endfor
            </div>
        </div>

        {{-- Time Slots (right 1/3) --}}
        <div class="bg-white border rounded p-4">
            <h4 class="text-md font-semibold text-gray-700 mb-2">24 May 2025</h4>
            <ul class="space-y-1 text-sm text-gray-600 h-96 overflow-y-auto">
                @foreach (['10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM', '1:00 PM', '1:30 PM', '2:00 PM', '2:30 PM', '3:00 PM', '3:30 PM', '4:00 PM', '4:30 PM'] as $slot)
                    <li class="border-b py-1">{{ $slot }}</li>
                @endforeach
            </ul>

            <button class="mt-4 w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded">
                Appointment Time
            </button>
        </div>
    </div>
@endsection
