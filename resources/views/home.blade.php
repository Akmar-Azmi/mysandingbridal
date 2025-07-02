@extends('layouts.base')

@section('title', 'Home')

@section('content')
{{-- Hero Section --}}
<section class="relative">
    <img src="{{ asset('images/homepage/hero.jpg') }}" class="w-full h-[500px] object-cover" alt="Hero Image">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white text-center animate-fade-in">
        <h1 class="text-4xl md:text-5xl font-bold mb-2">MySanding Bridal</h1>
        <p class="text-lg">Curating Elegant Moments, Flawless!</p>
    </div>
</section>

{{-- Why Choose Us --}}
<section class="py-16 bg-white">
    <div class="container mx-auto grid md:grid-cols-2 gap-12 px-6">
        <div class="animate-fade-right">
            <h3 class="text-xl text-gray-500">No one does it like…..</h3>
            <h2 class="text-2xl font-bold text-black mb-4">WHY CHOOSE US ?</h2>
            <p class="text-gray-600 mb-6">Lorem ipsum dolor sit amet. Sed aperiam amet est voluptate corrupti a quaerat debitis sed officiis velit ut saepe galisum et repellat voluptates. Ab vitae enim et commodi cumque qui dolor magni qui quibusdam debitis?</p>
            <a href="#" class="inline-block border border-black px-5 py-2 rounded-full text-sm hover:bg-black hover:text-white transition duration-300">Read More</a>
        </div>
        <div class="grid grid-cols-2 gap-4 animate-fade-left">
            @foreach(['why1.jpg', 'why2.jpg', 'why3.jpg'] as $img)
                <img src="{{ asset('images/homepage/' . $img) }}" class="rounded-md shadow hover:scale-105 transition duration-300" alt="">
            @endforeach
        </div>
    </div>
</section>

{{-- Services --}}
<section class="bg-[#D8B57F] py-16">
    <h2 class="text-center text-2xl font-semibold mb-8 animate-bounce">Services</h2>
    <div class="container mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 px-6">
        @foreach(['services1.jpg', 'services2.jpg', 'services3.jpg', 'services4.jpg'] as $img)
            <div class="text-center animate-zoom-in">
                <img src="{{ asset('images/homepage/' . $img) }}" class="rounded shadow mb-2 w-full h-48 object-cover" alt="">
                <div class="text-2xl text-black font-light">...................</div>
            </div>
        @endforeach
    </div>
</section>

{{-- Stats --}}
<section class="bg-white py-12 text-center grid grid-cols-1 md:grid-cols-3 gap-6 px-6 animate-fade-in">
    @foreach(['Event', 'Client', 'Client'] as $type)
        <div>
            <div class="text-3xl font-bold text-black">+500</div>
            <div class="text-lg font-normal">{{ $type }}</div>
        </div>
    @endforeach
</section>

{{-- Gallery --}}
<section class="bg-[#D8B57F] py-16">
    <h2 class="text-center text-2xl font-semibold mb-8">Gallery</h2>
    <div class="container mx-auto grid grid-cols-2 md:grid-cols-4 gap-4 px-6">
        @foreach(range(1, 8) as $i)
            <img src="{{ asset("images/homepage/gallery{$i}.jpg") }}" class="rounded-md shadow hover:scale-105 transition duration-300" alt="">
        @endforeach
    </div>
    <div class="text-center mt-6">
        <a href="{{ route('gallery') }}" class="inline-block border border-black px-5 py-2 rounded-full text-sm hover:bg-black hover:text-white transition duration-300">View More</a>
    </div>
</section>

{{-- Testimonial --}}
<section class="bg-white py-16 px-6">
    <div class="container mx-auto grid md:grid-cols-2 gap-8 items-center">
        <div class="animate-fade-right">
            <h2 class="text-2xl font-semibold mb-4">What Client Says...</h2>
            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet. Sed aperiam amet est voluptate corrupti a quaerat debitis sed officiis velit ut saepe galisum et repellat voluptates...</p>
            <div class="flex items-center space-x-4">
                <div class="bg-yellow-500 p-2 rounded-full">
                    <span class="text-black font-bold text-lg">👤</span>
                </div>
                <div>
                    <div class="font-semibold">Halim Hasim</div>
                    <div class="text-sm text-gray-500">CEO</div>
                </div>
            </div>
        </div>
        <img src="{{ asset('images/homepage/client.jpg') }}" class="rounded shadow animate-fade-left" alt="Client">
    </div>
</section>

{{-- Call to Action --}}
<section class="bg-[#D8B57F] text-center py-16 animate-fade-in">
    <h2 class="text-xl font-medium text-white mb-2">Let’s Turn Your Love Story Into an Unforgettable Celebration</h2>
    <p class="text-white mb-6">– Schedule a Chat With Us Today! –</p>
    <a href="{{ route('book') }}" class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-6 py-2 rounded-full border border-black transition duration-300">Book Appointment</a>
</section>
@endsection
