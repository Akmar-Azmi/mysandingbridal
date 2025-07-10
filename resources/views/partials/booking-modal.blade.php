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
                    <div :class="{ 'bg-white text-[#da4a80] ring-2 ring-[#da4a80]': step === i, 'bg-[#eaa1ac] text-white': step !==
                        i }"
                        class="w-8 h-8 rounded-full flex items-center justify-center font-semibold text-sm transition">
                        <span x-text="i"></span>
                    </div>
                </template>
            </div>
        </div>

        <!-- Form Body -->
        <div class="p-6 space-y-5">

            <!-- Step 1: Contact -->
            <div x-show="step === 1">
                <div class="text-center mb-4">
                    <div class="text-[#da4a80] text-3xl mb-1">👤</div>
                    <h3 class="font-semibold text-lg text-[#4d3a4c]">Personal Details</h3>
                    <p class="text-sm text-gray-500">Fill in your contact info</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <input type="text" x-model="form.name" placeholder="Full Name *" class="modern-field">
                    <input type="tel" x-model="form.phone" placeholder="Phone Number *" class="modern-field">
                </div>
                <input type="email" x-model="form.email" placeholder="Email Address *" class="modern-field mt-2">
            </div>

            <!-- Step 2: Package -->
            <div x-show="step === 2">
                <div class="text-center mb-4">
                    <div class="text-[#da4a80] text-3xl mb-1">💍</div>
                    <h3 class="font-semibold text-lg text-[#4d3a4c]">Choose Package</h3>
                    <p class="text-sm text-gray-500">Pick your dream wedding package</p>
                </div>
                <template x-for="(pkg, index) in packages" :key="index">
                    <label class="block border rounded-lg px-4 py-3 cursor-pointer mb-2 transition"
                        :class="form.package === pkg.name ? 'border-[#da4a80] bg-[#fef8f8]' : 'border-gray-300'">
                        <div class="flex justify-between items-center">
                            <div>
                                <h4 class="font-semibold text-[#4d3a4c]" x-text="pkg.name"></h4>
                                <p class="text-sm text-gray-500" x-text="pkg.desc"></p>
                            </div>
                            <div class="font-bold text-[#da4a80]" x-text="'RM ' + pkg.price"></div>
                        </div>
                        <input type="radio" x-model="form.package" :value="pkg.name" class="hidden">
                    </label>
                </template>
            </div>

            <!-- Step 3: Schedule -->
            <div x-show="step === 3">
                <div class="text-center mb-4">
                    <div class="text-[#da4a80] text-3xl mb-1">📅</div>
                    <h3 class="font-semibold text-lg text-[#4d3a4c]">Select Date & Time</h3>
                    <p class="text-sm text-gray-500">Pick your appointment slot</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="relative w-full">
                        <input type="date" x-model="form.date" class="modern-field pl-10 w-full">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                    </div>
                    <input type="time" x-model="form.time" class="modern-field">
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
                    <div><strong>Package:</strong> <span x-text="form.package"></span></div>
                    <div><strong>Date:</strong> <span x-text="form.date"></span></div>
                    <div><strong>Time:</strong> <span x-text="form.time"></span></div>
                </div>
                <textarea x-model="form.notes" placeholder="Special notes..."
                    class="modern-field resize-none w-full rounded-md mt-4">
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
                @apply w-full px-4 py-2 rounded-xl border border-[#c5c4cc] bg-[#f6f5f0] placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#da4a80];
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            function bookingForm() {
                return {
                    openBooking: false,
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
                    packages: [{
                            name: 'Basic',
                            desc: 'Basic wedding coverage',
                            price: 500
                        },
                        {
                            name: 'Premium',
                            desc: 'Full day with makeup',
                            price: 1000
                        },
                        {
                            name: 'Gold',
                            desc: 'All-inclusive luxury',
                            price: 2000
                        },
                    ],
                    validateAndNext() {
                        if (this.step === 1 && (!this.form.name || !this.form.phone || !this.form.email)) {
                            alert('Please fill in all required personal details.');
                            return;
                        }
                        if (this.step === 2 && !this.form.package) {
                            alert('Please select a wedding package.');
                            return;
                        }
                        if (this.step === 3 && (!this.form.date || !this.form.time)) {
                            alert('Please select a valid date and time.');
                            return;
                        }
                        this.step++;
                    },
                    submit() {
                        const msg = `*Wedding Appointment Booking*\n\n` +
                            `👤 Name: ${this.form.name}\n📱 Phone: ${this.form.phone}\n📧 Email: ${this.form.email}\n` +
                            `💍 Package: ${this.form.package}\n📅 Date: ${this.form.date}\n🕒 Time: ${this.form.time}\n` +
                            (this.form.notes ? `📝 Notes: ${this.form.notes}\n` : '');
                        const encoded = encodeURIComponent(msg);
                        window.open(`https://wa.me/60194248847?text=${encoded}`, '_blank');
                        alert("Redirecting to WhatsApp. Thank you!");
                        this.step = 1;
                        this.openBooking = false;
                    }
                }
            }
        </script>
    @endpush
