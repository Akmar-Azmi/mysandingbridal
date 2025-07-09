@extends('layouts.base')

@section('title', 'Gallery')

@section('content')
<!-- Hero Section -->
<div class="bg-[#d1af7c] py-16 text-center text-white">
    <h1 class="text-4xl font-bold text-gray-800 drop-shadow-md">Gallery</h1>
    <p class="text-lg italic text-gray-700 mt-2">Let's tell your story</p>
</div>

<!-- Gallery Section -->
<div class="bg-[#f9f6f2] py-12 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <!-- Example Image Blocks -->
        <div>
            <img src="{{ asset('images/gallery1.jpg') }}" alt="Gallery Image 1" class="rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
        </div>
        <div>
            <img src="{{ asset('images/gallery2.jpg') }}" alt="Gallery Image 2" class="rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
        </div>
        <div>
            <img src="{{ asset('images/gallery3.jpg') }}" alt="Gallery Image 3" class="rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
        </div>
        <div>
            <img src="{{ asset('images/gallery4.jpg') }}" alt="Gallery Image 4" class="rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
        </div>
        <div>
            <img src="{{ asset('images/gallery5.jpg') }}" alt="Gallery Image 5" class="rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
        </div>
    </div>
</div>

<!-- Past Events Header -->
<div class="bg-[#d1af7c] py-10 text-center">
    <h2 class="text-3xl font-semibold text-gray-800 drop-shadow">Past Events</h2>
</div>

<!-- Past Events Grid -->
<div class="bg-[#f9f6f2] py-12 px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-4 grid-rows-3 gap-4">

        <!-- Column 1 -->
        <div class="row-span-2 relative rounded-2xl overflow-hidden">
            <img src="https://via.placeholder.com/400x500?text=Buffet+Ramadhan" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Buffet Ramadhan 2025
            </div>
        </div>
        <div class="row-span-1 relative rounded-2xl overflow-hidden">
            <img src="https://via.placeholder.com/400x500?text=Buffet+Ramadhan" class="w-full h-full object-cover">
        </div>

        <!-- Column 2 -->
        <div class="row-span-1 rounded-2xl overflow-hidden">
            <img src="https://via.placeholder.com/400x500?text=Buffet+Ramadhan" class="w-full h-full object-cover">
        </div>
        <div class="row-span-1 rounded-2xl overflow-hidden">
            <img src="https://via.placeholder.com/400x500?text=Buffet+Ramadhan" class="w-full h-full object-cover">
        </div>
        <div class="row-span-1 relative rounded-2xl overflow-hidden">
            <img src="https://via.placeholder.com/400x500?text=Buffet+Ramadhan" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Pelamin
            </div>
        </div>

        <!-- Column 3 -->
        <div class="col-span-1 row-span-1 rounded-2xl overflow-hidden">
            <img src="https://via.placeholder.com/400x500?text=Buffet+Ramadhan" class="w-full h-full object-cover">
        </div>
        <div class="col-span-1 row-span-1 rounded-2xl overflow-hidden">
            <img src="https://via.placeholder.com/400x500?text=Buffet+Ramadhan" class="w-full h-full object-cover">
        </div>
        <div class="col-span-1 row-span-1 rounded-2xl overflow-hidden">
            <img src="https://via.placeholder.com/400x500?text=Buffet+Ramadhan" class="w-full h-full object-cover">
        </div>

        <!-- Column 4 -->
        <div class="row-span-1 rounded-2xl overflow-hidden">
            <img src="https://via.placeholder.com/400x500?text=Buffet+Ramadhan" class="w-full h-full object-cover">
        </div>
        <div class="row-span-1 rounded-2xl overflow-hidden">
            <img src="https://via.placeholder.com/400x500?text=Buffet+Ramadhan" class="w-full h-full object-cover">
        </div>
        <div class="row-span-1 rounded-2xl overflow-hidden">
            <img src="https://via.placeholder.com/400x500?text=Buffet+Ramadhan" class="w-full h-full object-cover">
        </div>

    </div>
</div>


@endsection
