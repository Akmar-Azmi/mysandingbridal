@extends('layouts.base')

@section('content')
<style>
    body {
        scroll-behavior: smooth;
        background-color: #FFFFFF;
        color: #1E1E1E;
    }

    .wedding-wrapper {
        display: flex;
        align-items: flex-start;
        justify-content: center;
        padding: 10px 20px 20px;
        margin-bottom: 20px;
    }

    .section-divider {
        height: 50px;
        background-color: #D6AFA3;
        width: 100%;
        margin: 60px 0;
    }
</style>

{{-- Fonts and AOS --}}
<link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init({ duration: 1000, once: true });

        // Wedding Services modal
        const modal = document.getElementById('service-modal');
        const modalTitle = document.getElementById('service-modal-title');
        const modalDesc = document.getElementById('service-modal-desc');
        const modalImage = document.getElementById('service-modal-image');
        document.querySelectorAll('.service-trigger').forEach(el => {
            el.addEventListener('click', () => {
                modalTitle.textContent = el.dataset.title;
                modalDesc.textContent = el.dataset.description;
                modalImage.src = el.dataset.img;
                modal.classList.remove('hidden');
            });
        });
        document.getElementById('service-close').addEventListener('click', () => modal.classList.add('hidden'));
        modal.addEventListener('click', e => { if (e.target === modal) modal.classList.add('hidden'); });

        // Other Services modal
        const otherModal = document.getElementById('other-service-modal');
        const otherTitle = document.getElementById('other-service-modal-title');
        const otherDesc = document.getElementById('other-service-modal-desc');
        const otherImage = document.getElementById('other-service-modal-image');
        document.querySelectorAll('.other-service-trigger').forEach(el => {
            el.addEventListener('click', () => {
                otherTitle.textContent = el.dataset.title;
                otherDesc.textContent = el.dataset.description;
                otherImage.src = el.dataset.img;
                otherModal.classList.remove('hidden');
            });
        });
        document.getElementById('other-service-close').addEventListener('click', () => otherModal.classList.add('hidden'));
        otherModal.addEventListener('click', e => { if (e.target === otherModal) otherModal.classList.add('hidden'); });
    });
</script>

{{-- Hero --}}
<section class="bg-gradient-to-l from-[#f6f5f0] to-[#f1e7e5] text-center py-12" data-aos="fade-up">
    <h1 class="text-4xl font-jacques font-semibold text-black mb-2">Services</h1>
    <p class="text-lg italic text-black/80">Discover all that we offer to help you plan the perfect wedding experience.</p>
</section>

{{-- Header --}}
<div class="text-center mt-8 mb-2" data-aos="fade-up">
    <h2 class="text-center text-3xl font-jacques font-normal mb-8 text-[#000000]">Wedding Services</h2>
</div>

{{-- Wedding Services --}}
<div class="wedding-wrapper">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-7xl mx-auto" data-aos="fade-up">
        <div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform hover:scale-105 cursor-pointer service-trigger"
            data-title="House Packages"
            data-description="Complete home-based wedding setup for up to 1,000 guests with VIP dome, buffet, canopy, and pelamin included."
            data-img="https://placehold.co/600x600/png">
            <img src="https://placehold.co/600x600/png" alt="House" class="w-full h-64 object-cover">
            <div class="p-4 text-center font-jacques text-lg text-[#5c4430] font-semibold">House Packages</div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform hover:scale-105 cursor-pointer service-trigger"
            data-title="Hall Packages"
            data-description="Elegant wedding arrangement in spacious halls with dome seating, decorative setup, buffet lines, and VIP seating."
            data-img="https://placehold.co/600x600/png">
            <img src="https://placehold.co/600x600/png" alt="Hall" class="w-full h-64 object-cover">
            <div class="p-4 text-center font-jacques text-lg text-[#5c4430] font-semibold">Hall Packages</div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform hover:scale-105 cursor-pointer service-trigger"
            data-title="Canopy Packages"
            data-description="Outdoor canopy wedding setup with scallops, tables, buffet stations, pelamin, and door gifts for a stylish celebration."
            data-img="https://placehold.co/600x600/png">
            <img src="https://placehold.co/600x600/png" alt="Canopy" class="w-full h-64 object-cover">
            <div class="p-4 text-center font-jacques text-lg text-[#5c4430] font-semibold">Canopy Packages</div>
        </div>
    </div>
</div>

{{-- Divider --}}
<div class="section-divider" data-aos="zoom-in"></div>

{{-- Other Services --}}
<section class="bg-[#fffcf3] py-16" data-aos="fade-up">
    <h2 class="text-center text-3xl font-jacques font-normal mb-8 text-[#000000]">
        <a href="#" class="hover:text-[#b98421] transition duration-300">Other Services</a>
    </h2>

    @php
        $services = [
            ['name' => 'Ramadhan Buffet', 'image' => 'wedding.jpg', 'desc' => 'Delicious buffet for buka puasa with variety of traditional dishes.'],
            ['name' => 'Catering', 'image' => 'catering.jpg', 'desc' => 'Custom catering for all types of events, big or small.'],
            ['name' => 'Decoration', 'image' => 'deco.jpg', 'desc' => 'Stylish decoration packages to match your dream theme.'],
            ['name' => 'Other event', 'image' => 'event.jpg', 'desc' => 'From engagement to birthday parties – we’ve got it covered.'],
        ];
    @endphp

    <div class="container mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 px-6">
        @foreach ($services as $service)
            <div class="text-center block cursor-pointer other-service-trigger"
                data-title="{{ $service['name'] }}"
                data-description="{{ $service['desc'] }}"
                data-img="{{ asset('images/' . $service['image']) }}">
                <img src="{{ asset('images/' . $service['image']) }}"
                    class="rounded shadow mb-2 w-full h-48 object-cover"
                    alt="{{ $service['name'] }}">
                <div class="text-xl font-jacques text-[#5d3c33] font-semibold hover:text-[#b98421] transition duration-300">
                    {{ $service['name'] }}
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- Wedding Modal --}}
<div id="service-modal" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 max-w-md w-full relative shadow-xl">
        <button id="service-close" class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-2xl">&times;</button>
        <img id="service-modal-image" src="" class="w-full h-48 object-cover rounded mb-4" />
        <h2 id="service-modal-title" class="text-xl font-bold mb-2"></h2>
        <p id="service-modal-desc" class="text-gray-700 text-sm leading-relaxed"></p>
    </div>
</div>

{{-- Other Services Modal --}}
<div id="other-service-modal" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 max-w-md w-full relative shadow-xl">
        <button id="other-service-close" class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-2xl">&times;</button>
        <img id="other-service-modal-image" src="" class="w-full h-48 object-cover rounded mb-4" />
        <h2 id="other-service-modal-title" class="text-xl font-bold mb-2"></h2>
        <p id="other-service-modal-desc" class="text-gray-700 text-sm leading-relaxed"></p>
    </div>
</div>

@endsection
