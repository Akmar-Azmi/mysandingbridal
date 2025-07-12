@extends('layouts.base')

@section('title', 'Our Clients')

@section('content')
    {{-- Hero Banner --}}
    <section class="bg-gradient-to-l from-[#f6f5f0] to-[#f1e7e5] text-center py-12" data-aos="fade-up">
        <h1 class="text-4xl font-jacques font-semibold text-black mb-2">Our Clients</h1>
        <p class="text-lg italic text-black/80">
            Grateful to the beautiful couples who entrusted us with their forever.
        </p>
    </section>

<!-- Testimonials Section -->
<div class="bg-[#ffffff] py-16 px-6 text-center">
    <h2 class="text-3xl font-jacques font-normal text-gray-800 mb-12">What client says...</h2>

    <!-- Testimonial 1 -->
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-start mb-16 text-left">
    <!-- Text -->
    <div class="space-y-4">
        <p class="text-lg italic text-black/80">
            <span class="text-xl text-gray-500 font-serif">❝</span>
            Lorem ipsum dolor sit amet. Sed aperiam amet est voluptate corrupti a quaerat debitis sed officiis velit ut saepe
            galsum et repellat voluptates. Ab vitae enim et commodi cumque qui dolor magni qui quibusdam debitis?
        </p>
        <p class="font-jacques font-semibold">– Aina & Hafiz, August 2024</p>
        <p class="text-sm text-gray-800 font-medium">
            Malay Traditional | The Majestic Hotel, Kuala Lumpur
        </p>
    </div>


        <!-- Image -->
        <div>
            <img src="https://placehold.co/400x200?text=Client+Image+1" alt="Client Image 1"
                class="rounded-xl shadow-lg w-full object-cover">
        </div>
    </div>

    <!-- Testimonial 2 -->
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-start mb-16 text-left">

        <!-- Image (on the left for testimonial 2) -->
        <div>
            <img src="https://placehold.co/400x200?text=Client+Image+2" alt="Client Image 2"
                class="rounded-xl shadow-lg w-full object-cover">
        </div>

        <!-- Text -->
        <div class="space-y-4">
            <p class="text-lg italic text-black/80">
                <span class="text-xl text-gray-500 font-serif">❝</span>
                Lorem ipsum dolor sit amet. Sed aperiam amet est voluptate corrupti a quaerat debitis sed officiis velit ut saepe
                galsum et repellat voluptates. Ab vitae enim et commodi cumque qui dolor magni qui quibusdam debitis?
            </p>
            <p class="font-jacques font-semibold">– Aina & Hafiz, August 2024</p>
            <p class="text-sm text-gray-800 font-medium">
                Fairy Tale | The Majestic Hotel, Kuala Lumpur
            </p>
        </div>
    </div>


    <!-- Rating -->
    <div class="mt-16 text-center">
        <div class="text-yellow-500 text-3xl space-x-1">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p class="mt-2 font-medium text-gray-800">Rated 5 Stars by 98% of Clients</p>
    </div>
</div>
@endsection
