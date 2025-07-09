@extends('layouts.base')

@section('title', 'Our Clients')

@section('content')
<!-- Hero Section -->
<div class="bg-[#d1af7c] py-12 text-center">
    <h1 class="text-4xl font-bold text-gray-800">Our Clients</h1>
    <p class="italic text-gray-700 mt-2">Grateful to the beautiful couples who entrusted us with their forever</p>
</div>

<!-- Testimonials Section -->
<div class="bg-[#f9f6f2] py-16 px-6 text-center">
    <h2 class="text-3xl font-semibold text-gray-800 mb-12">What client says...</h2>

    <!-- Testimonial 1 -->
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-start mb-16 text-left">
        <!-- Text -->
        <div class="space-y-4">
            <p class="text-sm text-gray-700">
                <span class="text-2xl text-gray-500 font-serif">❝</span>
                Lorem ipsum dolor sit amet. Sed aperiam amet est voluptate corrupti a quaerat debitis sed officiis velit ut saepe
                galsum et repellat voluptates. Ab vitae enim et commodi cumque qui dolor magni qui quibusdam debitis?
            </p>
            <p class="font-semibold">– Aina & Hafiz, August 2024</p>
            <p class="text-sm text-gray-800 font-medium">
                Malay Traditional | The Majestic Hotel, Kuala Lumpur
            </p>
        </div>

        <!-- Image -->
        <div>
            <img src="https://via.placeholder.com/600x400?text=Client+Image+1" alt="Client Image 1"
                class="rounded-xl shadow-lg w-full object-cover">
        </div>
    </div>

    <!-- Testimonial 2 -->
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-start text-left">
        <!-- Image -->
        <div>
            <img src="https://via.placeholder.com/600x400?text=Client+Image+2" alt="Client Image 2"
                class="rounded-xl shadow-lg w-full object-cover">
        </div>

        <!-- Text -->
        <div class="space-y-4">
            <p class="text-sm text-gray-700">
                <span class="text-2xl text-gray-500 font-serif">❝</span>
                Lorem ipsum dolor sit amet. Sed aperiam amet est voluptate corrupti a quaerat debitis sed officiis velit ut saepe
                galsum et repellat voluptates. Ab vitae enim et commodi cumque qui dolor magni qui quibusdam debitis?
            </p>
            <p class="font-semibold">– Aina & Hafiz, August 2024</p>
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
