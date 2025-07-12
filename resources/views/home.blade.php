@extends('layouts.base')

@section('title', 'Home')

@section('content')
<div x-data="{ openBooking: false, ...bookingForm() }">

    {{-- Hero Section --}}
    <section class="relative">
        <img src="{{ asset('images/main1.jpg') }}" class="w-full h-[500px] object-cover" alt="Hero Image">


    <div class="absolute inset-0 bg-[#000000]/40 flex justify-center items-center text-white text-center" data-aos="fade-up">
            <div class ="space-y-4 animate-fade-in">
            <h1 class="text-6xl font-jacques text-[#ffffff] font-normal">MySanding Bridal</h1>
                <p class="font-jacques text-lg text-white-800">Wedding Planner | Deco | Catering</p>
                <button @click="openBooking = true"
                    class="bg-white text-[#080501] font-semibold px-6 py-2 rounded-full border border-[#ddcdaf] hover:bg-[#ddcdaf] hover:text-black transition duration-300">                    
                    Book Appointment
                </button>
            </div>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="py-16 px-6 md:px-12 bg-white">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-10 items-center">
            <div class="flex flex-col justify-center space-y-4 text-left" data-aos="fade-right">
                <h3 class="text-xl text-[#000000]">Your Dream, Our Passion</h3>
                <h2 class="text-4xl font-jacques font-bold text-[#5d3c33] mb-4">WHY CHOOSE US?</h2>
                <p class="text-gray-600 mb-6">We bring beauty, tradition, and emotion together to create an unforgettable celebration. Our packages are carefully curated to suit every taste and style.</p>
                <a href="{{ route('about') }}" class="w-fit inline-block border border-[#b98421] text-[#b98421] px-5 py-2 rounded-full text-sm hover:bg-[#b98421] hover:text-white transition duration-300">
                    About Us
                </a>
            </div>

            <div class="grid grid-cols-2 gap-4" data-aos="fade-left">
                <!-- Left column (stacked vertically) -->
                <div class="space-y-4">
                    <img src="images/why1.jpg" class="w-full h-auto" alt="Left Top" />
                    <img src="images/why2.jpg" class="w-full h-auto" alt="Left Middle" />
                </div>

                <!-- Right column (stacked right side images) -->
                <div class="space-y-4">
                    <img src="images/why3.jpg" class="w-full h-auto" alt="Right Top" />
                    <img src="images/why4.jpg" class="w-full h-auto" alt="Right Bottom" />
                </div>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section class="bg-[#fffcf3] py-16" data-aos="fade-up">
        <h2 class="text-center text-3xl font-jacques font-normal mb-8 text-[#000000]">
            <a href="{{ route('services') }}" class="hover:text-[#b98421] transition duration-300">
                Our Services
            </a>
        </h2>

        @php
            $services = [
                ['name' => 'Wedding', 'image' => 'wedding.jpg'],
                ['name' => 'Catering', 'image' => 'catering.jpg'],
                ['name' => 'Decoration', 'image' => 'deco.jpg'],
                ['name' => 'Other event', 'image' => 'event.jpg'],
            ];
        @endphp

        <div class="container mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 px-6">
            @foreach ($services as $service)
                <a href="{{ route('services') }}" class="text-center block">
                    <img src="{{ asset('images/' . $service['image']) }}"
                        class="rounded shadow mb-2 w-full h-48 object-cover"
                        alt="{{ $service['name'] }}">
                    <div class="text-xl font-jacques text-[#5d3c33] font-semibold hover:text-[#b98421] transition duration-300">
                        {{ $service['name'] }}
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- Stats --}}
    <section class="bg-white py-12 text-center grid grid-cols-1 md:grid-cols-3 gap-6 px-6" data-aos="zoom-in-up">
        @foreach(['Weddings', 'Happy Clients', 'Events Done'] as $type)
            <div>
                <div class="text-4xl  font-bold text-[#5d3c33]">+500</div>
                <div class="text-lg font-jacques font-normal">{{ $type }}</div>
            </div>
        @endforeach
    </section>

    {{-- Gallery --}}
    <section class="bg-gradient-to-r from-[#fffdfc] to-[#f1e7e5] py-16" data-aos="fade-up">
        <h2 class="text-center text-3xl font-jacques font-normal mb-8 text-[#000000]">
            <a href="{{ route('gallery') }}" class="hover:text-[#b98421] transition duration-300">
                Gallery
            </a>
        </h2>

        <div class="max-w-6xl mx-auto grid grid-cols-4 gap-4 px-6 items-stretch">
            {{-- Column 1 --}}
            <div class="flex flex-col gap-4">
                <img src="images/why3.jpg" class="rounded-md shadow object-cover" alt="">
                <img src="images/why1.jpg" class="rounded-md shadow object-cover h-full w-full" alt="">
            </div>

            {{-- Column 2 --}}
            <div class="flex flex-col gap-4">
                <img src="images/deco.jpg" class="rounded-md shadow object-cover" alt="">

                <div class="grid grid-cols-2 gap-4">
                    <img src="images/main2.jpg" class="rounded-md shadow object-cover" alt="">
                    <img src="images/catering.jpg" class="rounded-md shadow object-cover" alt="">
                </div>

                <img src="images/main1.jpg" class="rounded-md shadow object-cover" alt="">
            </div>

            {{-- Column 3 --}}
            <div>
                <img src="images/gallery2.jpg" class="rounded-md shadow object-cover h-full w-full" alt="">
            </div>

            {{-- Column 4 --}}
            <div class="flex flex-col gap-5">
                <img src="images/event.jpg" class="rounded-md shadow object-cover" alt="">
                <img src="images/why4.jpg" class="rounded-md shadow object-cover" alt="">
            </div>
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('gallery') }}"
            class="inline-block border border-[#5d3c33] text-[#5d3c33] px-6 py-2 rounded-full text-sm hover:bg-[#5d3c33] hover:text-white transition duration-300">
                View More
            </a>
        </div>
    </section>



    {{-- Testimonials --}}
    <section class="bg-white py-16 px-6" data-aos="fade-right">
        <div class="container mx-auto grid md:grid-cols-2 gap-8 items-center">
            <div>
                <h2 class="text-3xl font-jacques  font-medium mb-4 text-[#5d3c33]">
                    <a href="{{ route('clients') }}" class="hover:text-[#b98421] transition duration-300">
                        What Clients Say...
                    </a>
                </h2>

                <p class="text-gray-600 mb-4">"Thank you to the Mysanding team. Everything was perfect — the pelamin, outfits, food, DJ, and everything else. I pray for the Mysanding team’s success in all areas."</p>
                <div class="flex items-center space-x-4">
                    <div class="bg-pink-200 p-2 rounded-full">
                        <span class="text-[#da4a80] font-bold text-lg">👰</span>
                    </div>
                    <div>
                        <div class="font-jacques font-semibold text-[#b98421]">Hana</div>
                        <div class="text-sm text-gray-500">Happy Bride</div>
                    </div>
                </div>
            </div>
                <img src="images/happybride2.jpg" alt="Client Image 1"
                    class="rounded-xl shadow-lg w-full object-cover">        
        </div>
    </section>

    {{-- Call to Action --}}
    <section class="bg-gradient-to-l from-[#f6f5f0] to-[#f1e7e5] text-center py-16" data-aos="fade-up">
        <h2 class="text-xl font-jacques font-medium text-[#5d3c33] mb-2">Let's Design Your Dream Wedding Together</h2>
        <p class="text-[#83365a] mb-6">– Chat with Our Bridal Consultant Today! –</p>
        <button @click="openBooking = true"
                class="bg-white text-[#b98421] font-semibold px-6 py-2 rounded-full border border-[#b98421] hover:bg-[#b98421] hover:text-white transition duration-300">
            Book Appointment
        </button>
    </section>

    {{-- Booking Modal --}}
    @include('partials.booking-modal')

</div>
@endsection
