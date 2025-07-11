<!-- Booking Modal -->
<div x-show="openBooking" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 p-4 sm:p-6 overflow-auto transition-all duration-300">
    <div @click.outside="openBooking = false"
        class="bg-white rounded-xl shadow-2xl w-full max-w-lg mt-10 animate-fade-in">

        <!-- Header -->
        <div class="bg-gradient-to-r from-[#f1e7e5] to-[#eaa1ac] text-[#4d3a4c] py-5 px-6 text-center">
            <h2 class="text-xl font-bold tracking-wide">Book Your Wedding Appointment</h2>
            <div class="mt-4 flex justify-center gap-3">
                <template x-for="i in 4">
                    <div :class="{
                        'bg-white text-[#da4a80] ring-2 ring-[#da4a80]': step === i,
                        'bg-[#eaa1ac] text-white': step !== i
                    }"
                        class="w-8 h-8 rounded-full flex items-center justify-center font-semibold text-sm transition">
                        <span x-text="i"></span>
                    </div>
                </template>
            </div>
        </div>

        <!-- Form Steps -->
        <div class="p-6 space-y-5">
            <!-- Step 1: Contact -->
            <div x-show="step === 1">
                <div class="text-center mb-4">
                    <div class="text-[#da4a80] text-3xl mb-1">👤</div>
                    <h3 class="font-semibold text-lg text-[#4d3a4c]">Personal Details</h3>
                    <p class="text-sm text-gray-500">Fill in your contact info</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <input type="text" x-model="form.name" placeholder="Full Name *"
                        class="w-full px-5 py-2.5 rounded-full border border-[#c5c4cc] bg-[#f6f5f0] placeholder-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-[#da4a80]">
                    <input type="tel" x-model="form.phone" placeholder="Phone Number *"
                        class="w-full px-5 py-2.5 rounded-full border border-[#c5c4cc] bg-[#f6f5f0] placeholder-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-[#da4a80]">
                    <input type="email" x-model="form.email" placeholder="Email Address *"
                        class="w-full mt-2 px-5 py-2.5 rounded-full border border-[#c5c4cc] bg-[#f6f5f0] placeholder-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-[#da4a80]">
                </div>
            </div>

            <!-- Success Message -->
            <div x-show="showSuccess" class="text-center py-10 animate-fade-in">
                <div class="text-4xl text-green-500 mb-4">🎉</div>
                <h3 class="text-lg font-semibold text-[#4d3a4c]">Booking Sent!</h3>
                <p class="text-sm text-gray-500">Redirecting to WhatsApp...</p>
            </div>


            <!-- Step 2: Event Preferences -->
            <div x-show="step === 2">
                <div class="text-center mb-6">
                    <div class="text-4xl mb-2">💌</div>
                    <h3 class="font-bold text-lg text-[#4d3a4c]">Event Preferences</h3>
                    <p class="text-sm text-gray-500">Tell us about your event</p>
                </div>

                <!-- Event Type Select -->
                <div class="mb-5">
                    <select x-model="form.eventType"
                        class="w-full px-4 py-3 rounded-full border border-[#c5c4cc] bg-[#f6f5f0] placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#da4a80] transition">
                        <option value="">Select Event Type</option>
                        <option value="Wedding">Wedding</option>
                        <option value="Engagement">Engagement</option>
                        <option value="Reception">Reception</option>
                        <option value="Birthday">Birthday</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Budget Range Slider -->
                <div class="mb-2">
                    <label class="text-sm text-[#4d3a4c] font-medium block mb-1">Estimated Budget: RM <span
                            x-text="form.budget"></span></label>
                    <input type="range" min="3000" max="200000" step="100" x-model="form.budget"
                        class="w-full accent-[#da4a80] rounded-full overflow-hidden appearance-none h-2 bg-[#e9e9ec]">
                </div>
            </div>


            <!-- Step 3: Schedule -->
            <div x-show="step === 3">
                <div class="text-center mb-4">
                    <div class="text-[#da4a80] text-3xl mb-1">📅</div>
                    <h3 class="font-semibold text-lg text-[#4d3a4c]">Select Date & Time</h3>
                    <p class="text-sm text-gray-500">Pick your appointment slot</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <!-- Date Picker -->
                    <div class="relative w-full">
                        <input type="date" x-model="form.date" :min="today" @change="checkMonday"
                            class="modern-field pl-10 w-full">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                    </div>

                    <!-- Time Dropdown -->
                    <select x-model="form.time" class="modern-field w-full">
                        <option value="">Select time</option>
                        <template x-for="t in timeSlots">
                            <option x-text="t"></option>
                        </template>
                    </select>
                </div>
            </div>

            <!-- Step 4: Confirmation -->
            <div x-show="step === 4">
                <div class="text-center mb-4">
                    <div class="text-[#da4a80] text-3xl mb-1">✅</div>
                    <h3 class="font-semibold text-lg text-[#4d3a4c]">Confirm Booking</h3>
                    <p class="text-sm text-gray-500">Review your details before sending</p>
                </div>
                <div class="bg-[#fef8f8] border border-[#da4a80] rounded-md p-4 text-sm space-y-2">
                    <div><strong>Name:</strong> <span x-text="form.name"></span></div>
                    <div><strong>Phone:</strong> <span x-text="form.phone"></span></div>
                    <div><strong>Event:</strong> <span x-text="form.eventType"></span></div>
                    <div><strong>Budget:</strong> RM <span x-text="form.budget"></span></div>
                    <div><strong>Date:</strong> <span x-text="form.date"></span></div>
                    <div><strong>Time:</strong> <span x-text="form.time"></span></div>
                </div>
                <textarea x-model="form.notes" maxlength="1000" placeholder="Special notes..."
                    class="modern-field resize-none w-full rounded-md mt-4 h-24">
                </textarea>
                <div class="text-sm text-right text-gray-400 mt-1"
                    x-text="`${form.notes.trim().split(/\s+/).filter(Boolean).length}/100 words max`">
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex flex-wrap justify-between items-center pt-3">
                <button x-show="step === 1" @click="openBooking = false"
                    class="bg-gray-100 text-[#4d3a4c] px-5 py-2 rounded-md hover:bg-gray-200">
                    Cancel
                </button>
                <button x-show="step > 1" @click="step--"
                    class="border border-[#c5c4cc] text-[#4d3a4c] px-5 py-2 rounded-md hover:bg-[#f6f5f0]">
                    Back
                </button>
                <button x-show="step < 4" @click="validateAndNext"
                    class="bg-[#da4a80] text-white px-6 py-2 rounded-md hover:bg-[#c8406e] transition ml-auto">
                    Next
                </button>
                <button x-show="step === 4" @click="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition ml-auto">
                    Send to WhatsApp
                </button>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <style>
        .modern-field {
            @apply w-full px-5 py-2.5 rounded-full border border-[#c5c4cc] bg-[#f6f5f0] placeholder-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-[#da4a80] transition;
        }

        textarea.modern-field {
            @apply rounded-xl;
            /* override to look like rectangular box */
        }

        select.modern-field {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 20 20' fill='gray' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' d='M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.25 8.27a.75.75 0 01-.02-1.06z' clip-rule='evenodd' /%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2em;
        }

        /* Slider thumb custom */
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 16px;
            width: 16px;
            background-color: #da4a80;
            border-radius: 9999px;
            border: 2px solid white;
            margin-top: -7px;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        input[type="range"]::-webkit-slider-runnable-track {
            height: 6px;
            background-color: #e2e2e2;
            border-radius: 9999px;
        }

        input[type="range"]::-moz-range-thumb {
            height: 16px;
            width: 16px;
            background-color: #da4a80;
            border-radius: 9999px;
            border: 2px solid white;
            cursor: pointer;
        }

        input[type="range"]::-moz-range-track {
            height: 6px;
            background-color: #e2e2e2;
            border-radius: 9999px;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.4s ease-out;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function bookingForm() {
            return {
                showSuccess: false,
                openBooking: false,
                step: 1,
                form: {
                    name: '',
                    phone: '',
                    email: '',
                    eventType: '',
                    budget: 2000,
                    date: '',
                    time: '',
                    notes: '',
                },
                isMonday(date) {
                    const d = new Date(date);
                    return d.getDay() === 1;
                },
                minDate() {
                    const today = new Date();
                    return today.toISOString().split("T")[0];
                },
                validateAndNext() {
                    if (this.step === 1 && (!this.form.name || !this.form.phone || !this.form.email)) {
                        alert('Please complete all contact details.');
                        return;
                    }
                    if (this.step === 2 && (!this.form.eventType || !this.form.budget)) {
                        alert('Please select an event type and budget.');
                        return;
                    }
                    if (this.step === 3 && (!this.form.date || !this.form.time || this.isMonday(this.form.date))) {
                        alert('Please select a valid date (Tue–Sun) and time (10AM–6PM).');
                        return;
                    }
                    this.step++;
                },

                today: new Date().toISOString().split('T')[0],

                timeSlots: [
                    '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM',
                    '12:00 PM', '12:30 PM', '01:00 PM', '01:30 PM',
                    '02:00 PM', '02:30 PM', '03:00 PM', '03:30 PM',
                    '04:00 PM', '04:30 PM', '05:00 PM', '05:30 PM',
                    '06:00 PM',
                ],

                checkMonday() {
                    const date = new Date(this.form.date);
                    const isMonday = date.getDay() === 1;
                    if (isMonday) {
                        alert("Sorry, we’re closed on Mondays. Please choose another date.");
                        this.form.date = "";
                    }
                },

                submit() {
                    const msg = `*Wedding Appointment Booking*\n\n` +
                        `👤 Name: ${this.form.name}\n📱 Phone: ${this.form.phone}\n📧 Email: ${this.form.email}\n` +
                        `📌 Event: ${this.form.eventType}\n💸 Budget: RM ${this.form.budget}\n` +
                        `📅 Date: ${this.form.date}\n🕒 Time: ${this.form.time}\n` +
                        (this.form.notes ? `📝 Notes: ${this.form.notes}\n` : '');

                    const encoded = encodeURIComponent(msg);

                    // ✅ Submit to Laravel
                    fetch('/appointment', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(this.form)
                        })
                        .then(() => {
                            // ✅ Redirect to WhatsApp
                            window.open(`https://wa.me/60194248847?text=${encoded}`, '_blank');

                            this.showSuccess = true;

                            // ✅ Reset form after 2s
                            setTimeout(() => {
                                this.showSuccess = false;
                                this.openBooking = false;
                                this.step = 1;
                                this.form = {
                                    name: '',
                                    phone: '',
                                    email: '',
                                    eventType: '',
                                    budget: 2000,
                                    date: '',
                                    time: '',
                                    notes: ''
                                };
                            }, 2000);
                        });
                }
            }
        }
    </script>
@endpush
