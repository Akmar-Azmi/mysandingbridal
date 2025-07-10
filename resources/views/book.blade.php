@extends('layouts.base')

@section('title', 'Booking Appointment')

@section('content')
<div x-data="{ showModal: true, step: 1 }" class="relative">
    <!-- Popup Modal Overlay -->
    <div x-show="showModal"
         x-transition:enter
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm"
         x-cloak>
        <!-- Modal Box -->
        <div class="bg-white w-full max-w-xl rounded-2xl shadow-lg p-8 relative">
            <!-- Header -->
            <div class="mb-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800">Booking Appointment</h2>
                <p class="text-sm text-gray-500">Please complete your booking in two simple steps</p>
            </div>

            <!-- Step 1: Date & Time -->
            <div x-show="step === 1">
                <label class="block mb-4">
                    <span class="text-gray-700 font-medium">Select Date</span>
                    <input type="date" x-model="selectedDate"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm px-4 py-2">
                </label>

                <label class="block mb-6">
                    <span class="text-gray-700 font-medium">Select Time</span>
                    <input type="time" x-model="selectedTime"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm px-4 py-2">
                </label>

                <div class="flex justify-end gap-4">
                    <!-- Cancel beside Next -->
                    <a href="{{ route('home') }}"
                       class="bg-[#FFF2D9] text-black font-medium px-6 py-2 rounded-full hover:bg-[#ffe3ad] transition">
                        Cancel
                    </a>
                    <button @click="step = 2"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black font-medium px-6 py-2 rounded-full">
                        Next
                    </button>
                </div>
            </div>

            <!-- Step 2: User Details -->
            <div x-show="step === 2" x-cloak>
                <form id="bookingForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input name="name" type="text" placeholder="Full Name" required
                            class="border rounded px-4 py-2">
                        <input name="age" type="number" placeholder="Age" required
                            class="border rounded px-4 py-2">
                        <input name="phone" type="tel" placeholder="Phone Number" required
                            class="border rounded px-4 py-2">
                        <input name="email" type="email" placeholder="Email" required
                            class="border rounded px-4 py-2">
                        <input name="address" type="text" placeholder="Address" required
                            class="border rounded px-4 py-2">
                        <input name="city" type="text" placeholder="City" required
                            class="border rounded px-4 py-2">
                        <input name="postcode" type="text" placeholder="Postcode" required
                            class="border rounded px-4 py-2">
                        <input name="state" type="text" placeholder="State" required
                            class="border rounded px-4 py-2">
                    </div>

                    <div class="mt-4">
                        <select name="package" required class="w-full border rounded px-4 py-2">
                            <option disabled selected>Select Wedding Package</option>
                            <option value="Basic">Basic</option>
                            <option value="Premium">Premium</option>
                            <option value="Gold">Gold</option>
                        </select>
                    </div>

                    <div class="mt-6 flex justify-end gap-4">
                        <!-- Back and Submit -->
                        <button @click="step = 1" type="button"
                            class="bg-[#FFF2D9] text-black font-medium px-6 py-2 rounded-full hover:bg-[#ffe3ad] transition">
                            Back
                        </button>
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded-full">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('bookingForm')?.addEventListener('submit', function (e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        const payload = {
            name: formData.get('name'),
            age: formData.get('age'),
            phone: formData.get('phone'),
            email: formData.get('email'),
            address: formData.get('address'),
            city: formData.get('city'),
            postcode: formData.get('postcode'),
            state: formData.get('state'),
            package: formData.get('package'),
            date: document.querySelector('[x-model="selectedDate"]').value,
            time: document.querySelector('[x-model="selectedTime"]').value,
        };

        fetch('{{ route('appointment.store') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(payload),
        })
        .then(response => response.json())
        .then(data => {
            alert('Success! Appointment saved.');
            window.open(`https://wa.me/60194248847?text=Hi! I have booked:\n${JSON.stringify(payload, null, 2)}`, '_blank');
        })
        .catch(error => {
            console.error(error);
            alert('Something went wrong!');
        });
    });
</script>
@endpush
