@extends('layouts.base')

@section('title', 'Home')

@section('content')
<div x-data="{ openBooking: false, ...bookingForm() }">

    {{-- Hero Section --}}
    <section class="relative">
        <img src="{{ asset('images/main1.jpg') }}" class="w-full h-[500px] object-cover" alt="Hero Image">


    <div class="absolute inset-0 bg-[#000000]/40 flex justify-center items-center text-white text-center" data-aos="fade-up">
            <div class ="space-y-4 animate-fade-in">
                <h1 class="text-4xl md:text-5xl font-bold">MY SANDING </h1>
                <p class="text-lg">Wedding Planner | Deco | Catering</p>
                <button @click="openBooking = true"
                    class="bg-white text-[#5c4430] font-semibold px-6 py-2 rounded-full border border-[#da4a80] hover:bg-[#da4a80] hover:text-white transition duration-300">                    
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
                <h2 class="text-2xl font-bold text-[#5d3c33] mb-4">WHY CHOOSE US?</h2>
                <p class="text-gray-600 mb-6">We bring beauty, tradition, and emotion together to create an unforgettable celebration. Our packages are carefully curated to suit every taste and style.</p>
                <a href="#" class="w-fit inline-block border border-[#5d3c33] text-[#5d3c33] px-5 py-2 rounded-full text-sm hover:bg-[#5d3c33] hover:text-white transition duration-300">
                    Read More
                </a>
            </div>

            <div class="grid grid-cols-2 gap-4" data-aos="fade-left">
                <!-- Left column (stacked vertically) -->
                <div class="space-y-4">
                    <img src="https://placehold.co/200x200" class="rounded w-full h-auto" alt="Left Top" />
                    <img src="https://placehold.co/200x100" class="rounded w-full h-auto" alt="Left Middle" />
                </div>

                <!-- Right column (stacked right side images) -->
                <div class="space-y-4">
                    <img src="https://placehold.co/200x100" class="rounded w-full h-auto" alt="Right Top" />
                    <img src="https://placehold.co/200x200" class="rounded w-full h-auto" alt="Right Bottom" />
                </div>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section class="bg-[#fdf6f2] py-16" data-aos="fade-up">
        <h2 class="text-center text-2xl font-semibold mb-8 text-[#000000]">Our Services</h2>
        @php
        $services = [
            ['name' => 'Wedding', 'image' => 'bridal.jpg'],
            ['name' => 'Catering', 'image' => 'catering.jpg'],
            ['name' => 'Decoration', 'image' => 'deco.jpg'],
            ['name' => 'Other event', 'image' => 'entertainment.jpg'],
        ];
        @endphp

        <div class="container mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 px-6">
            @foreach ($services as $service)
                <div class="text-center">
                    <img src="{{ asset('images/services/' . $service['image']) }}"
                        class="rounded shadow mb-2 w-full h-48 object-cover"
                        alt="{{ $service['name'] }}">
                    <div class="text-xl text-[#5d3c33] font-medium">{{ $service['name'] }}</div>
                </div>
            @endforeach
         </div>
    </section>

    {{-- Stats --}}
    <section class="bg-white py-12 text-center grid grid-cols-1 md:grid-cols-3 gap-6 px-6" data-aos="zoom-in-up">
        @foreach(['Weddings', 'Happy Clients', 'Events Done'] as $type)
            <div>
                <div class="text-3xl font-bold text-[#5d3c33]">+500</div>
                <div class="text-lg font-normal">{{ $type }}</div>
            </div>
        @endforeach
    </section>

    {{-- Gallery --}}
    <section class="bg-gradient-to-r from-[#f1e7e5] to-[#aaa39d] py-16" data-aos="fade-up>
        <h2 class="text-center text-2xl font-semibold mb-10 text-[#000000]">Gallery</h2>

        <div class="max-w-6xl mx-auto grid grid-cols-4 gap-4 px-6 items-stretch">
            {{-- Column 1 --}}
            <div class="flex flex-col gap-4">
                <img src="https://placehold.co/300x200?text=Gallery+1" class="rounded-md shadow object-cover" alt="">
                <img src="https://placehold.co/300x300?text=Gallery+2" class="rounded-md shadow object-cover h-full w-full" alt="">
            </div>

            {{-- Column 2 --}}
            <div class="flex flex-col gap-4">
                <img src="https://placehold.co/300x200?text=Gallery+3" class="rounded-md shadow object-cover" alt="">

                <div class="grid grid-cols-2 gap-4">
                    <img src="https://placehold.co/140x150?text=Gallery+4" class="rounded-md shadow object-cover" alt="">
                    <img src="https://placehold.co/140x150?text=Gallery+5" class="rounded-md shadow object-cover" alt="">
                </div>

                <img src="https://placehold.co/300x260?text=Gallery+9" class="rounded-md shadow object-cover" alt="">
            </div>

            {{-- Column 3 --}}
            <div>
                <img src="https://placehold.co/300x620?text=Gallery+6" class="rounded-md shadow object-cover h-full w-full" alt="">
            </div>

            {{-- Column 4 --}}
            <div class="flex flex-col gap-5">
                <img src="https://placehold.co/300x310?text=Gallery+7" class="rounded-md shadow object-cover" alt="">
                <img src="https://placehold.co/300x310?text=Gallery+8" class="rounded-md shadow object-cover" alt="">
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
                <h2 class="text-2xl font-semibold mb-4 text-[#da4a80]">What Clients Say...</h2>
                <p class="text-gray-600 mb-4">“From the very first call, we knew MySanding was the right choice. They made our wedding elegant, effortless, and unforgettable.”</p>
                <div class="flex items-center space-x-4">
                    <div class="bg-pink-200 p-2 rounded-full">
                        <span class="text-[#da4a80] font-bold text-lg">👰</span>
                    </div>
                    <div>
                        <div class="font-semibold text-[#da4a80]">Nur Aisyah</div>
                        <div class="text-sm text-gray-500">Happy Bride</div>
                    </div>
                </div>
            </div>
                <img src="https://placehold.co/400x200?text=Client+Image+1" alt="Client Image 1"
                    class="rounded-xl shadow-lg w-full object-cover">        
        </div>
    </section>

    {{-- Call to Action --}}
    <section class="bg-gradient-to-l from-[#f6f5f0] to-[#f1e7e5] text-center py-16" data-aos="fade-up">
        <h2 class="text-xl font-medium text-[#da4a80] mb-2">Let's Design Your Dream Wedding Together</h2>
        <p class="text-[#da4a80] mb-6">– Chat with Our Bridal Consultant Today! –</p>
        <button @click="openBooking = true"
                class="bg-white text-[#2F2F2F] font-semibold px-6 py-2 rounded-full border border-[#2F2F2F] hover:bg-[#2F2F2F] hover:text-white transition duration-300">
            Book Appointment
        </button>
    </section>

    {{-- Booking Modal --}}
    @include('partials.booking-modal')

</div>
@endsection
