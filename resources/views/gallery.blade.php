@extends('layouts.base')

@section('title', 'Gallery')

@section('content')

{{-- Hero Banner --}}
<section class="bg-gradient-to-l from-[#f6f5f0] to-[#f1e7e5] text-center py-12" data-aos="fade-up">
    <h1 class="text-4xl font-jacques font-semibold text-black mb-2">Gallery</h1>
    <p class="text-lg italic text-black/80">
        Let's tell your story.
    </p>
</section>

<!-- Gallery Grid Section -->
<div class="bg-[#ffffff] py-12 px-6">
    <div class="max-w-7xl mx-auto justify-center">
        <div class="w-full">
            <div class="grid grid-cols-5 gap-6 max-w-[1200px] mx-auto scale-[0.85] md:scale-[0.9] lg:scale-[0.95] px-2">
                @foreach($images as $img)
                    <div class="swiper-slide !w-auto" data-aos="fade-right">
                        <img src="{{ $img->url }}"
                             alt="Gallery image"
                             class="w-full h-full object-cover rounded-xl shadow-md">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Past Events Header -->
<div class="bg-[#f6f5f0] py-10 text-center mt-16">
    <h2 class="text-3xl font-jacques font-semibold text-black-800 drop-shadow">Past Events</h2>
</div>

<!-- Past Events Grid -->
<div class="bg-[#f6f5f0] py-12 px-4 sm:px-6 lg:px-8" data-aos="fade-up">
    <div class="w-full">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 max-w-[1200px] mx-auto scale-[0.80] md:scale-[0.1] lg:scale-[1.00] px-2">
            @foreach ($pastEvents as $event)
                <div class="col-span-1 row-span-1 rounded-xl overflow-hidden relative aspect-[4/3.5]">
                    <div class="event-thumbnail cursor-pointer w-full h-full"
                         data-title="{{ $event->title }}"
                         data-description="{{ $event->description }}">
                        <img src="{{ $event->image }}" 
                             class="w-full h-full object-cover rounded-xl shadow-md" 
                             alt="{{ $event->title }}">
                        <div class="absolute bottom-2 left-2 text-white text-sm font-semibold bg-black/40 px-2 py-1 rounded">
                            {{ $event->title }}
                        </div>
                    </div>
                </div>
            @endforeach
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const thumbnails = document.querySelectorAll('.event-thumbnail');
        const modal = document.getElementById('event-modal');
        const modalTitle = document.getElementById('modal-title');
        const modalDesc = document.getElementById('modal-desc');
        const modalImage = document.getElementById('modal-image');
        const closeModal = document.getElementById('close-modal');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {
                modalTitle.textContent = thumb.getAttribute('data-title');
                modalDesc.textContent = thumb.getAttribute('data-description');
                modalImage.src = thumb.querySelector('img').src;
                modal.classList.remove('hidden');
            });
        });

        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                modal.classList.add('hidden');
            }
        });
    });
</script>

@endsection
