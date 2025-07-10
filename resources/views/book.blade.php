@extends('layouts.base')

@section('title', 'Book Appointment')

@section('content')
<div x-data="bookingForm()" x-init="$nextTick(() => step =1)" x-cloak class="min-h-screen bg-gradient-to-b from-blue-500 to-blue-100 py-10 px-4 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl overflow-hidden">
        <!-- Header -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <div class="bg-blue-600 px-6 py-5 text-white text-center rounded-t-xl">
            <h2 class="text-2xl font-bold">Book Your Appointment</h2>
            <div class="flex justify-center mt-4 space-x-2">
                <template x-for="i in 4">
                    <div :class="{
                            'bg-white text-blue-600 font-bold': step === i,
                            'bg-blue-400 text-white': step !== i
                        }"
                        class="w-8 h-8 rounded-full flex items-center justify-center transition">
                        <span x-text="i"></span>
                    </div>
                </template>
            </div>
        </div>

        <!-- Step Body -->
        <div class="p-8">
            <!-- STEP 1 -->
            <div x-show="step === 1">
                <div class="text-center mb-6">
                    <svg class="w-12 h-12 text-blue-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M5.121 17.804A9 9 0 1121 12.001"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mt-2">Personal Information</h3>
                    <p class="text-sm text-gray-500">Please provide your contact details</p>
                </div>

                <div class="space-y-4">
                    <input x-model="form.name" type="text" placeholder="Full Name *" class="w-full border rounded px-4 py-2">
                    <input x-model="form.phone" type="text" placeholder="Phone Number *" class="w-full border rounded px-4 py-2">
                    <input x-model="form.email" type="email" placeholder="Email Address *" class="w-full border rounded px-4 py-2">
                </div>

                <div class="mt-6 text-right">
                    <button @click="step++" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded">
                        Next
                    </button>
                </div>
            </div>

            <!-- STEP 2 -->
            <div x-show="step === 2" x-transition>
                <div class="text-center mb-6">
                    <svg class="w-12 h-12 text-blue-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M12 3v18m9-9H3"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mt-2">Select Wedding Package</h3>
                    <p class="text-sm text-gray-500">Choose a wedding package</p>
                </div>

                <div class="space-y-3">
                    <template x-for="option in packages">
                        <label class="border rounded-lg p-4 flex justify-between items-center cursor-pointer hover:bg-blue-50"
                               :class="form.package === option.name ? 'ring-2 ring-blue-400 bg-blue-50' : ''">
                            <div>
                                <p class="font-semibold" x-text="option.name"></p>
                                <p class="text-sm text-gray-500" x-text="option.desc"></p>
                            </div>
                            <div class="text-blue-600 font-bold" x-text="option.price"></div>
                            <input type="radio" class="hidden" :value="option.name" x-model="form.package">
                        </label>
                    </template>
                </div>

                <div class="mt-6 flex justify-between">
                    <button @click="step--" class="border px-6 py-2 rounded text-gray-600 hover:bg-gray-100">
                        Previous
                    </button>
                    <button @click="step++" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded">
                        Next
                    </button>
                </div>
            </div>

            <!-- STEP 3 -->
            <div x-show="step === 3" x-transition>
                <div class="text-center mb-6">
                    <svg class="w-12 h-12 text-blue-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mt-2">Select Date & Time</h3>
                    <p class="text-sm text-gray-500">Choose your preferred appointment slot</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input x-model="form.date" type="date" class="w-full border rounded px-4 py-2">
                    <input x-model="form.time" type="time" class="w-full border rounded px-4 py-2">
                </div>

                <div class="mt-6 flex justify-between">
                    <button @click="step--" class="border px-6 py-2 rounded text-gray-600 hover:bg-gray-100">
                        Previous
                    </button>
                    <button @click="step++" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded">
                        Next
                    </button>
                </div>
            </div>

            <!-- STEP 4 -->
            <div x-show="step === 4" x-transition>
                <div class="text-center mb-6">
                    <svg class="w-12 h-12 text-blue-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16h6"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mt-2">Additional Notes & Confirmation</h3>
                    <p class="text-sm text-gray-500">Review your booking details</p>
                </div>

                <div class="bg-gray-50 p-4 rounded mb-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Customer</p>
                            <p class="font-semibold" x-text="form.name"></p>
                            <p class="text-sm" x-text="form.phone"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Wedding Package</p>
                            <p class="font-semibold" x-text="form.package"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Date</p>
                            <p class="font-semibold" x-text="form.date"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Time</p>
                            <p class="font-semibold" x-text="form.time"></p>
                        </div>
                    </div>
                </div>

                <textarea x-model="form.notes" class="w-full border rounded px-4 py-2" rows="3" placeholder="Any special requests or additional information..."></textarea>

                <div class="mt-6 flex justify-between">
                    <button @click="step--" class="border px-6 py-2 rounded text-gray-600 hover:bg-gray-100">
                        Previous
                    </button>
                    <button @click="submitBooking"
                        class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded">
                        Send to WhatsApp
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                notes: ''
            },
            packages: [
                { name: 'Basic', desc: 'Includes standard service', price: 'RM 500' },
                { name: 'Premium', desc: 'Includes additional perks', price: 'RM 800' },
                { name: 'Gold', desc: 'All-inclusive deluxe package', price: 'RM 1200' },
            ],
            submitBooking() {
                const msg = `*Wedding Appointment Booking:*\n\n` +
                    `👤 *Name:* ${this.form.name}\n📞 *Phone:* ${this.form.phone}\n📧 *Email:* ${this.form.email}\n` +
                    `💍 *Package:* ${this.form.package}\n📅 *Date:* ${this.form.date}\n⏰ *Time:* ${this.form.time}\n` +
                    `📝 *Notes:* ${this.form.notes || '-'}`;

                const encodedMsg = encodeURIComponent(msg);
                window.open(`https://wa.me/60194248847?text=${encodedMsg}`, '_blank');
            }
        }
    }
</script>
@endpush
