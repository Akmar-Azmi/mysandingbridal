@extends('layouts.base')

@section('title', 'Home')

@section('content')
<div x-data="{ openBooking: false, ...bookingForm() }">

    {{-- Hero Section --}}
    <section class="relative">
        <img src="{{ asset('images/homepage/hero.jpg') }}" class="w-full h-[500px] object-cover" alt="Hero Image">
        <div class="absolute inset-0 bg-[#da4a80]/40 flex flex-col justify-center items-center text-white text-center animate-fade-in">
            <div class="space-y-4 animate-fade-in">
                <h1 class="text-4xl md:text-5xl font-bold">MySanding Bridal</h1>
                <p class="text-lg">Curating Elegant Moments, Flawless!</p>
                <button @click="openBooking = true"
                    class="mt-6 bg-white text-[#da4a80] font-semibold px-6 py-2 rounded-full border border-[#da4a80] hover:bg-[#da4a80] hover:text-white transition duration-300">
                    Book Appointment
                </button>
            </div>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="bg-[#FFFBF0] py-16 px-6 md:px-12">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">
        
            {{-- LEFT TEXT CONTENT --}}
            <div class="space-y-4 text-gray-800">
                <p class="text-2xl font-light">No one does it like…..</p>
                <h2 class="text-3xl font-bold text-gray-900">WHY CHOOSE US ?</h2>
                <p class="text-gray-700 leading-relaxed">
                    Lorem ipsum dolor sit amet. Sed aperiam amet est voluptate corrupti a quaerat debitis sed officiis 
                    velit ut saepe galisum et repellat voluptates. Ab vitae enim et commodi cumque qui dolor magni qui 
                    quibusdam debitis?
                </p>
                <a href="#read-more" class="inline-block mt-4">
                    <button class="border border-gray-700 text-gray-700 font-medium px-6 py-2 rounded-full hover:bg-gray-700 hover:text-white transition duration-300">
                        Read More
                    </button>
                </a>
            </div>

            {{-- RIGHT IMAGE GRID --}}
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-4">
                    <img src="https://placehold.co/200x200" alt="Wedding Couple" class="rounded-md object-cover h-auto w-full" />
                    <img src="https://placehold.co/200x100" alt="Table Setup" class="rounded-md object-cover w-full h-auto" />
                </div>

                <div class="space-y-4">
                    <img src="https://placehold.co/200x100" alt="Catering" class="rounded-md w-full h-auto" />
                    <img src="https://placehold.co/200x200" alt="wedding" class="rounded w-full h-auto" />
                </div>

            </div>

        </div>
    </section>

    {{-- Call to Action --}}
    <section class="bg-gradient-to-l from-[#f6f5f0] to-[#f1e7e5] text-center py-16">
        <h2 class="text-xl font-medium text-[#da4a80] mb-2">Let's Design Your Dream Wedding Together</h2>
        <p class="text-[#da4a80] mb-6">– Chat with Our Bridal Consultant Today! –</p>
        <button @click="openBooking = true"
                class="bg-white text-[#da4a80] font-semibold px-6 py-2 rounded-full border border-[#da4a80] hover:bg-[#da4a80] hover:text-white transition duration-300">
            Book Appointment
        </button>
    </section>

    {{-- Booking Modal --}}
    @include('partials.booking-modal')

</div>
@endsection
