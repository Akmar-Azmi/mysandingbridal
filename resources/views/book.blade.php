@extends('layouts.base')

@section('title', 'Booking Appointment')

@section('content')
<div x-data="{ showModal: true, step: 1 }" class="relative">
    <!-- Booking Modal -->
    <div x-show="showModal"
         x-transition
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60"
         x-cloak>
        <div class="bg-white w-full max-w-2xl rounded-lg shadow-lg p-8 relative">
            <!-- Header -->
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-800">Booking Appointment</h2>
                <p class="text-sm text-gray-500">Please complete your booking in two simple steps</p>
            </div>

            <!-- Step 1: Date and Time -->
            <div x-show="step === 1">
                <label class="block mb-4">
                    <span class="text-gray-700 font-medium">Select Date</span>
                    <input type="date" x-model="selectedDate"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                </label>

                <label class="block mb-6">
                    <span class="text-gray-700 font-medium">Select Time</span>
                    <input type="time" x-model="selectedTime"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                </label>

                <div class="flex justify-between">
                    <a href="{{ route('home') }}" class="text-sm text-red-500 underline">Cancel</a>
                    <button @click="step = 2"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded">
                        Next
                    </button>
                </div>
            </div>

            <!-- Step 2: Details -->
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
                        <select name="package" required
                            class="w-full border rounded px-4 py-2">
                            <option disabled selected>Select Wedding Package</option>
                            <option value="Basic">Basic</option>
                            <option value="Premium">Premium</option>
                            <option value="Gold">Gold</option>
                        </select>
                    </div>

                    <div class="mt-6 flex justify-between">
                        <button @click="step = 1"
                            type="button"
                            class="text-sm text-yellow-600 underline">Back</button>
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded">
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
    document.addEventListener('alpine:init', () => {
        Alpine.data('booking', () => ({
            step: 1,
            showModal: true,
            selectedDate: '',
            selectedTime: '',
        }));
    });

    document.getElementById('bookingForm')?.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const details = {
            name: formData.get('name'),
            age: formData.get('age'),
            phone: formData.get('phone'),
            email: formData.get('email'),
            address: formData.get('address'),
            city: formData.get('city'),
            postcode: formData.get('postcode'),
            state: formData.get('state'),
            package: formData.get('package'),
        };

        const selectedDate = document.querySelector('[x-model="selectedDate"]').value;
        const selectedTime = document.querySelector('[x-model="selectedTime"]').value;

        const message = `*Booking Appointment Details:*\n\n` +
            `📅 Date: ${selectedDate}\n🕒 Time: ${selectedTime}\n` +
            `👤 Name: ${details.name}\n🎂 Age: ${details.age}\n📞 Phone: ${details.phone}\n📧 Email: ${details.email}\n` +
            `🏡 Address: ${details.address}, ${details.city}, ${details.postcode}, ${details.state}\n` +
            `💍 Wedding Package: ${details.package}`;

        const encodedMessage = encodeURIComponent(message);
        const whatsappURL = `https://wa.me/60123456789?text=${encodedMessage}`;
        window.open(whatsappURL, '_blank');
    });
</script>
@endpush
