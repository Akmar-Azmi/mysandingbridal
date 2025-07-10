@extends('layouts.base')

@section('title', 'Gallery')

@section('content')
<!-- Hero Section -->
<div class="bg-[#d1af7c] py-16 text-center text-white">
    <h1 class="text-4xl font-bold text-gray-800 drop-shadow-md">Gallery</h1>
    <p class="text-lg italic text-gray-700 mt-2">Let's tell your story</p>
</div>


<!-- Gallery Grid Section -->
<div class="bg-[#f9f6f2] py-12 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="swiper myGallerySwiper px-6">
            <div class="swiper-wrapper items-end">
                <!-- Example Image Blocks -->
                <div class="swiper-slide !w-auto">
                    <img src="https://placehold.co/200x300" class="w-full h-full object-cover rounded-xl shadow-md" >
                </div>
                <div class="swiper-slide !w-auto">
                    <img src="https://placehold.co/200x350" class="w-full h-full object-cover rounded-xl shadow-md">
                </div>
                <div class="swiper-slide !w-auto">
                    <img src="https://placehold.co/200x400" class="w-full h-full object-cover rounded-xl shadow-md">
                </div>
                <div class="swiper-slide !w-auto">
                    <img src="https://placehold.co/200x350" class="w-full h-full object-cover rounded-xl shadow-md">
                </div>
                <div class="swiper-slide !w-auto">
                    <img src="https://placehold.co/200x300" class="w-full h-full object-cover rounded-xl shadow-md">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Past Events Header -->
<div class="bg-[#d1af7c] py-10 text-center mt-16">
    <h2 class="text-3xl font-semibold text-gray-800 drop-shadow">Past Events</h2>
</div>

<!-- Past Events Grid -->
<div class="bg-[#f9f6f2] py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full">
        <div class="grid grid-cols-5 gap-6 max-w-[1200px] mx-auto scale-[0.85] md:scale-[0.9] lg:scale-[0.95] px-2">

        <!-- Column 1 -->
        <div class="col-span-1 row-span-1  rounded-xl overflow-hidden relative">
            <img src="https://placehold.co/200x200?text=buffet" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Buffet Ramadhan 2025
            </div>
        </div>

        <div class="col-span-1 row-span-2 rounded-xl overflow-hidden relative">
            <img src="https://placehold.co/200x400?text=Wedding" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Wedding Reception 2025
            </div>
        </div>

        <div class="col-span-1 row-span-1 rounded-xl overflow-hidden relative">
            <img src="https://placehold.co/200x200?text=Graduation" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Graduation Ceremony 2025
            </div>
        </div>

        <div class="col-span-1 row-span-1 rounded-xl overflow-hidden relative">
            <img src="https://placehold.co/200x200?text=Birthday" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Birthday Celebration 2025
            </div>
        </div>

        <div class="col-start-5 col-span-1 row-span-3 rounded-xl overflow-hidden relative">
            <img src="https://placehold.co/400x200?text=Corporate" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Corporate Event 2025
            </div>
        </div>

        <div class="row-start-2 col-span-1 row-span-1 rounded-xl overflow-hidden relative">
            <img src="https://placehold.co/200x200?text=Pelamin" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Pelamin
            </div>
        </div>
        
        <div class="col-start-3 col-span-2 row-span-1 rounded-xl overflow-hidden relative">
            <img src="https://placehold.co/400x200?text=Anniversary" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Anniversary Celebration 2025
            </div>
        </div>

        <div class="row-start-3 col-span-2 row-span-1 rounded-xl overflow-hidden relative">
            <img src="https://placehold.co/400x200?text=Catering" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Catering
            </div>
        </div>

        <div class="col-start-3 col-span-1 row-span-1 rounded-xl overflow-hidden relative">
            <img src="https://placehold.co/200x200?text=Food" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Food
            </div>
        </div>

        <div class="col-start-4 col-span-1 row-span-1 rounded-xl overflow-hidden relative">
            <img src="https://placehold.co/200x200?text=Concert" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Concert Event 2025
            </div>
        </div>

        </div>
    </div>
</div>
@endsection
