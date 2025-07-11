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
    <div class="max-w-7xl mx-auto justify-center">
        <div class="w-full">
        <div class="grid grid-cols-5 gap-6 max-w-[1200px] mx-auto scale-[0.85] md:scale-[0.9] lg:scale-[0.95] px-2">

                <!-- Example Image Blocks -->
                <div class="swiper-slide !w-auto">
                    <img src="https://placehold.co/200x300" class="w-full h-full object-cover rounded-xl shadow-md" >
                </div>
                <div class="swiper-slide !w-auto">
                    <img src="https://placehold.co/200x300" class="w-full h-full object-cover rounded-xl shadow-md">
                </div>
                <div class="swiper-slide !w-auto">
                    <img src="https://placehold.co/200x300" class="w-full h-full object-cover rounded-xl shadow-md">
                </div>
                <div class="swiper-slide !w-auto">
                    <img src="https://placehold.co/200x300" class="w-full h-full object-cover rounded-xl shadow-md">
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
            <div class="event-thumbnail cursor-pointer" data-title="Buffet Ramadhan 2025" data-description="Buffet Ramadhan 2025 was hosted with 500+ guests. It featured traditional dishes, live music, and a cozy festive vibe.">
                <img src="https://placehold.co/200x200?text=buffet" class="w-full h-full object-cover">
                    <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                    Buffet Ramadhan 2025
                    </div>
            </div>
        </div>

        <div class="col-span-1 row-span-2 rounded-xl overflow-hidden relative">
            <div class="event-thumbnail cursor-pointer" data-title="Wedding Reception 2025" data-description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl lobortis, tincidunt nisl non">
                <img src="https://placehold.co/200x400?text=Wedding" class="w-full h-full object-cover">
                    <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                    Wedding Reception 2025
                    </div>
            </div>
        </div>

        <div class="col-span-1 row-span-1 rounded-xl overflow-hidden relative">
            <div class="event-thumbnail cursor-pointer" data-title="Graduation Ceremony 2025" data-description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl lobortis, tincidunt nisl non">
                <img src="https://placehold.co/200x200?text=Graduation" class="w-full h-full object-cover">
                <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Graduation Ceremony 2025
                </div>
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
            <div class="event-thumbnail cursor-pointer" data-title="Pelamin" data-description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl lobortis, tincidunt nisl non">    
                <img src="https://placehold.co/200x200?text=Pelamin" class="w-full h-full object-cover">
                    <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                        Pelamin
                    </div>
            </div>
        </div>
        
        <div class="col-start-3 col-span-2 row-span-1 rounded-xl overflow-hidden relative">
            <img src="https://placehold.co/400x200?text=Anniversary" class="w-full h-full object-cover">
            <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                Anniversary Celebration 2025
            </div>
        </div>

        <div class="row-start-3 col-span-2 row-span-1 rounded-xl overflow-hidden relative">
            <div class="event-thumbnail cursor-pointer" data-title="Catering" data-description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl lobortis, tincidunt nisl non">
                <img src="https://placehold.co/400x200?text=Catering" class="w-full h-full object-cover">
                    <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                        Catering
                    </div>
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


<!-- Modal Structure -->
<div id="event-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl p-6 w-[90%] max-w-lg relative animate-fade-in">
        <!-- Close Button -->
        <button id="close-modal" class="absolute top-3 right-3 text-gray-500 hover:text-pink-500 text-xl font-bold">&times;</button>
        
        <!-- Image -->
        <img id="modal-image" src="" alt="Event Image" class="w-full h-52 sm:h-60 object-cover rounded-xl mb-4 shadow-md">

        <!-- Title -->
        <h2 id="modal-title" class="text-xl sm:text-2xl font-bold text-[#5c4430] mb-2 text-center"></h2>

        <!-- Description -->
        <p id="modal-desc" class="text-gray-700 text-sm sm:text-base leading-relaxed text-center"></p>
    </div>
</div>


@endsection
 

