@extends('layouts.base')

@section('title', 'Home')

@section('content')
<div x-data="{ openBooking: false, ...bookingForm() }">

    {{-- Hero Section --}}
    <section class="relative">
        <img src="{{ asset('images/homepage/hero.jpg') }}" class="w-full h-[500px] object-cover" alt="Hero Image">
        <div class="absolute inset-0 bg-[#da4a80]/40 flex flex-col justify-center items-center text-white text-center animate-fade-in">
            <h1 class="text-4xl md:text-5xl font-bold mb-2">MySanding Bridal</h1>
            <p class="text-lg">Curating Elegant Moments, Flawless!</p>
            <button @click="openBooking = true"
                class="mt-6 bg-white text-[#da4a80] font-semibold px-6 py-2 rounded-full border border-[#da4a80] hover:bg-[#da4a80] hover:text-white transition duration-300">
                Book Appointment
            </button>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto grid md:grid-cols-2 gap-12 px-6">
            <div>
                <h3 class="text-xl text-[#eaa1ac]">Your Dream, Our Passion</h3>
                <h2 class="text-2xl font-bold text-[#da4a80] mb-4">WHY CHOOSE US?</h2>
                <p class="text-gray-600 mb-6">We bring beauty, tradition, and emotion together to create an unforgettable celebration. Our packages are carefully curated to suit every taste and style.</p>
                <a href="#" class="inline-block border border-[#da4a80] text-[#da4a80] px-5 py-2 rounded-full text-sm hover:bg-[#da4a80] hover:text-white transition duration-300">Read More</a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach(['why1.jpg', 'why2.jpg', 'why3.jpg'] as $img)
                    <img src="{{ asset('images/homepage/' . $img) }}" class="rounded-md shadow hover:scale-105 transition duration-300" alt="">
                @endforeach
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section class="bg-[#f1e7e5] py-16">
        <h2 class="text-center text-2xl font-semibold mb-8 text-[#da4a80]">Our Services</h2>
        <div class="container mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 px-6">
            @foreach(['services1.jpg', 'services2.jpg', 'services3.jpg', 'services4.jpg'] as $img)
                <div class="text-center">
                    <img src="{{ asset('images/homepage/' . $img) }}" class="rounded shadow mb-2 w-full h-48 object-cover" alt="">
                    <div class="text-xl text-[#da4a80] font-medium">Service Name</div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Stats --}}
    <section class="bg-white py-12 text-center grid grid-cols-1 md:grid-cols-3 gap-6 px-6">
        @foreach(['Weddings', 'Happy Clients', 'Events Done'] as $type)
            <div>
                <div class="text-3xl font-bold text-[#da4a80]">+500</div>
                <div class="text-lg font-normal">{{ $type }}</div>
            </div>
        @endforeach
    </section>

    {{-- Gallery --}}
    <section class="bg-gradient-to-r from-[#f1e7e5] to-[#eaa1ac] py-16">
        <h2 class="text-center text-2xl font-semibold mb-8 text-[#da4a80]">Gallery</h2>
        <div class="container mx-auto grid grid-cols-2 md:grid-cols-4 gap-4 px-6">
            @foreach(range(1, 8) as $i)
                <img src="{{ asset("images/homepage/gallery{$i}.jpg") }}" class="rounded-md shadow hover:scale-105 transition duration-300" alt="">
            @endforeach
        </div>
        <div class="text-center mt-6">
            <a href="{{ route('gallery') }}" class="inline-block border border-[#da4a80] text-[#da4a80] px-5 py-2 rounded-full text-sm hover:bg-[#da4a80] hover:text-white transition duration-300">View More</a>
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="bg-white py-16 px-6">
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
            <img src="{{ asset('images/homepage/client.jpg') }}" class="rounded shadow" alt="Client">
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
