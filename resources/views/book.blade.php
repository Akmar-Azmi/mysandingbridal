@extends('layouts.base')

@section('title', 'Book Appointment')

@section('content')
<div class="bg-[#FFFBF1] min-h-screen py-12 px-6">
    <div class="max-w-4xl mx-auto">

        {{-- Step 1: Choose Date and Time --}}
        <div id="step1">
            <h2 class="text-2xl font-bold text-center mb-6">Book Your Appointment Now</h2>
            <div class="bg-white shadow-md rounded-lg p-6">
                <form id="step1-form">
                    <div class="mb-4">
                        <label class="font-semibold block mb-1">Select Date:</label>
                        <input type="date" id="date" name="date" class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="mb-6">
                        <label class="font-semibold block mb-1">Select Time:</label>
                        <select id="time" name="time" class="w-full border px-3 py-2 rounded" required>
                            @foreach(['10:00 AM','10:30 AM','11:00 AM','11:30 AM','12:00 PM','12:30 PM','1:00 PM','1:30 PM','2:00 PM','2:30 PM','3:00 PM','3:30 PM','4:00 PM','4:30 PM'] as $slot)
                                <option value="{{ $slot }}">{{ $slot }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-between">
                        <a href="{{ url('/') }}" class="bg-gray-200 text-black px-6 py-2 rounded hover:bg-gray-300">Cancel</a>
                        <button type="button" onclick="nextStep()" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">Next</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Step 2: Fill in Form --}}
        <div id="step2" style="display:none;">
            <h2 class="text-2xl font-bold text-center mb-6">Fill Your Details</h2>
            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('appointment.submit') }}" method="POST" id="booking-form">
                    @csrf
                    <input type="hidden" name="date" id="date-hidden">
                    <input type="hidden" name="time" id="time-hidden">

                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="font-semibold block mb-1">Full Name:</label>
                            <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="font-semibold block mb-1">Age:</label>
                                <input type="number" name="age" class="w-full border px-3 py-2 rounded" required>
                            </div>
                            <div>
                                <label class="font-semibold block mb-1">Phone Number:</label>
                                <input type="text" name="phone" class="w-full border px-3 py-2 rounded" required>
                            </div>
                            <div>
                                <label class="font-semibold block mb-1">Email:</label>
                                <input type="email" name="email" class="w-full border px-3 py-2 rounded" required>
                            </div>
                        </div>
                        <div>
                            <label class="font-semibold block mb-1">Address:</label>
                            <input type="text" name="address" class="w-full border px-3 py-2 rounded" required>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="font-semibold block mb-1">City:</label>
                                <input type="text" name="city" class="w-full border px-3 py-2 rounded" required>
                            </div>
                            <div>
                                <label class="font-semibold block mb-1">Postcode:</label>
                                <input type="text" name="postcode" class="w-full border px-3 py-2 rounded" required>
                            </div>
                            <div>
                                <label class="font-semibold block mb-1">State:</label>
                                <input type="text" name="state" class="w-full border px-3 py-2 rounded" required>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-between">
                        <button type="button" onclick="goBack()" class="bg-gray-200 text-black px-6 py-2 rounded hover:bg-gray-300">Back</button>
                        <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
    function nextStep() {
        const date = document.getElementById('date').value;
        const time = document.getElementById('time').value;
        if (!date || !time) return alert("Please pick a date and time.");
        document.getElementById('date-hidden').value = date;
        document.getElementById('time-hidden').value = time;
        document.getElementById('step1').style.display = 'none';
        document.getElementById('step2').style.display = 'block';
    }

    function goBack() {
        document.getElementById('step2').style.display = 'none';
        document.getElementById('step1').style.display = 'block';
    }
</script>
@endsection
