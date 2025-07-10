@extends('layouts.base')

@section('title', 'Book Appointment')

@section('content')
<div x-data="{ openBooking: false, ...bookingForm() }">
    <!-- This listens to the navbar button (just make sure its @click="openBooking = true") -->

    <!-- Booking Modal -->
    <div x-show="openBooking" x-cloak class="fixed inset-0 z-50 flex items-start justify-center bg-black bg-opacity-60 p-6 overflow-auto">
        <div @click.outside="openBooking = false"
             class="bg-white rounded-xl shadow-2xl overflow-hidden w-full max-w-lg mt-10">

            <!-- Header -->
            <div class="bg-gradient-to-r from-[#7e5a3a] to-[#d1af7c] text-white py-5 px-6 text-center">
                <h2 class="text-xl font-bold tracking-wide">Book Your Wedding Appointment</h2>
                <div class="mt-4 flex justify-center gap-3">
                    <template x-for="i in 4">
                        <div :class="{'bg-white text-[#7e5a3a] ring-2 ring-[#7e5a3a]': step === i, 'bg-[#a27c52]/70 text-white': step !== i}"
                             class="w-8 h-8 rounded-full flex items-center justify-center font-semibold text-sm transition">
                            <span x-text="i"></span>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-6 space-y-4">
                <!-- Step 1 -->
                <div x-show="step === 1">
                    <div class="text-center mb-3">
                        <div class="text-[#7e5a3a] text-3xl mb-1">👤</div>
                        <h3 class="font-medium text-lg">Personal Details</h3>
                        <p class="text-sm text-gray-500">Fill in your contact info</p>
                    </div>
                    <input type="text" x-model="form.name" placeholder="Full Name *" class="input-style">
                    <input type="tel" x-model="form.phone" placeholder="Phone Number *" class="input-style">
                    <input type="email" x-model="form.email" placeholder="Email Address *" class="input-style">
                </div>

                <!-- Step 2 -->
                <div x-show="step === 2">
                    <div class="text-center mb-3">
                        <div class="text-[#7e5a3a] text-3xl mb-1">💍</div>
                        <h3 class="font-medium text-lg">Choose Package</h3>
                        <p class="text-sm text-gray-500">Pick your dream wedding package</p>
                    </div>
                    <template x-for="(pkg, index) in packages" :key="index">
                        <label class="block border rounded-lg px-4 py-3 cursor-pointer mb-2 transition"
                               :class="form.package === pkg.name ? 'border-[#d1af7c] bg-[#fff7ee]' : 'border-gray-300'">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h4 class="font-semibold text-gray-800" x-text="pkg.name"></h4>
                                    <p class="text-sm text-gray-500" x-text="pkg.desc"></p>
                                </div>
                                <div class="font-bold text-[#7e5a3a]" x-text="'RM ' + pkg.price"></div>
                            </div>
                            <input type="radio" x-model="form.package" :value="pkg.name" class="hidden">
                        </label>
                    </template>
                </div>

                <!-- Step 3 -->
                <div x-show="step === 3">
                    <div class="text-center mb-3">
                        <div class="text-[#7e5a3a] text-3xl mb-1">📅</div>
                        <h3 class="font-medium text-lg">Schedule</h3>
                        <p class="text-sm text-gray-500">Pick the perfect date & time</p>
                    </div>
                    <input type="date" x-model="form.date" class="input-style mb-3">
                    <input type="time" x-model="form.time" class="input-style">
                </div>

                <!-- Step 4 -->
                <div x-show="step === 4">
                    <div class="text-center mb-3">
                        <div class="text-[#7e5a3a] text-3xl mb-1">✅</div>
                        <h3 class="font-medium text-lg">Confirm Booking</h3>
                        <p class="text-sm text-gray-500">Review your details</p>
                    </div>
                    <div class="bg-[#fff7ee] border border-[#d1af7c] rounded-md p-4 text-sm space-y-2">
                        <div><strong>Name:</strong> <span x-text="form.name"></span></div>
                        <div><strong>Phone:</strong> <span x-text="form.phone"></span></div>
                        <div><strong>Package:</strong> <span x-text="form.package"></span></div>
                        <div><strong>Date:</strong> <span x-text="form.date"></span></div>
                        <div><strong>Time:</strong> <span x-text="form.time"></span></div>
                    </div>
                    <textarea x-model="form.notes" placeholder="Special requests..." class="input-style mt-3"></textarea>
                </div>

                <!-- Navigation -->
                <div class="flex justify-between pt-2">
                    <button x-show="step > 1" @click="step--"
                            class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md shadow-sm">
                        Back
                    </button>
                    <button x-show="step < 4" @click="step++"
                            class="bg-[#7e5a3a] text-white px-6 py-2 rounded-md hover:bg-[#5d3f26] transition">
                        Next
                    </button>
                    <button x-show="step === 4" @click="submit"
                            class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition">
                        Send to WhatsApp
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .input-style {
        @apply w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#d1af7c];
    }
</style>
@endpush

@push('scripts')
<script>
    function bookingForm() {
        return {
            step: 1,
            form: {
                name: '',
                phone: '',
                email: '',
                package: '',
                date: '',
                time: '',
                notes: '',
            },
            packages: [
                { name: 'Basic', desc: 'Basic wedding coverage', price: 500 },
                { name: 'Premium', desc: 'Full day with makeup', price: 1000 },
                { name: 'Gold', desc: 'All-inclusive luxury', price: 2000 },
            ],
            submit() {
                const msg =
                    `*Wedding Appointment Booking*\n\n` +
                    `👤 Name: ${this.form.name}\n📱 Phone: ${this.form.phone}\n📧 Email: ${this.form.email}\n` +
                    `💍 Package: ${this.form.package}\n📅 Date: ${this.form.date}\n🕒 Time: ${this.form.time}\n` +
                    (this.form.notes ? `📝 Notes: ${this.form.notes}\n` : '');
                const encoded = encodeURIComponent(msg);
                window.open(`https://wa.me/60123456789?text=${encoded}`, '_blank');
            }
        }
    }
</script>
@endpush
