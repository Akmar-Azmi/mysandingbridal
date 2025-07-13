@extends('layouts.base')

@section('content')
<style>
    body {
        scroll-behavior: smooth;
        background-color: #FFFFFF; /* Bright white */
        color: #1E1E1E; /* Neutral dark for text */
    }

    .wedding-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    .wedding-grid-container {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .wedding-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Bigger columns */
        gap: 30px;
        width: 100%;
        text-align: center;
        padding: 0 20px;
    }

.service-text-box {
    background-color: #bea687;
    color: #1E1E1E;
    font-weight: 600;
    font-size: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    aspect-ratio: 1 / 1;
    width: 100%;
    border: 2px solid #D4E6D2;
    font-family: 'Jacques Francois', serif;
    padding: 10px;
    transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}

    /* 👇 Hover Effect */
    .service-text-box:hover {
        transform: scale(1.05);
        background-color: #d8c4a5; /* lighter shade */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}
    .service-img {
        width: 100%;
        aspect-ratio: 1 / 1;
        object-fit: cover;
        border: 3px solid #FFFFFF;
        border-radius: 8px;
    }

    .wedding-center-text {
        font-size: 40px;
        font-weight: normal;
        padding: 40px 0;
        grid-column: 2;
        font-family: 'Jacques Francois', serif;
        color: #1E1E1E;
    }

    .section-divider {
        height: 50px;
        background-color: #D6AFA3; /* muted pastel divider */
        width: 100%;
        margin: 60px 0;
    }

    .other-services {
        padding: 60px 20px;
        text-align: center;
        background-color: #fffcf3;
    }

    .other-services h2 {
        font-size: 30px;
        margin-bottom: 40px;
        font-family: 'Jacques Francois', serif;
        color: #1E1E1E;
    }

    .other-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        max-width: 900px;
        margin: 0 auto;
    }

    .other-item img {
        width: 100%;
        object-fit: cover;
        height: 150px;
        border: 3px solid #D4E6D2; /* green border for floral touch */
        border-radius: 6px;
    }

    .other-item div {
        margin-top: 10px;
        font-weight: 600;
        font-family: 'Jacques Francois', serif;
        color: #1E1E1E;
    }
</style>

{{-- Load Fonts and AOS --}}
<link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init({
            duration: 1000,
            once: true
        });
    });
</script>

<div class="container">

    {{-- Wedding Services --}}
    <div class="wedding-wrapper">
    <div class="wedding-grid-container">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-7xl mx-auto" data-aos="fade-up">
            
            <!-- Wedding Packages -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform hover:scale-105 cursor-pointer service-trigger"
                 data-title="Wedding Packages"
                 data-description="Complete wedding packages with decoration, coordination, and photography."
                 data-img="https://placehold.co/600x600/png">
                <img src="https://placehold.co/600x600/png" alt="Wedding Packages" class="w-full h-64 object-cover">
                <div class="p-4 text-center font-jacques text-lg text-[#5c4430] font-semibold">
                    Wedding Packages
                </div>
            </div>

            <!-- Catering Packages -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform hover:scale-105 cursor-pointer service-trigger"
                 data-title="Catering Packages"
                 data-description="Buffet & fine dining options tailored for all wedding sizes."
                 data-img="https://placehold.co/600x600/png">
                <img src="https://placehold.co/600x600/png" alt="Catering Packages" class="w-full h-64 object-cover">
                <div class="p-4 text-center font-jacques text-lg text-[#5c4430] font-semibold">
                    Catering Packages
                </div>
            </div>

            <!-- Wedding Attire -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform hover:scale-105 cursor-pointer service-trigger"
                 data-title="Wedding Attire"
                 data-description="Modern and traditional bridal outfits available for rental and custom order."
                 data-img="https://placehold.co/600x600/png">
                <img src="https://placehold.co/600x600/png" alt="Wedding Attire" class="w-full h-64 object-cover">
                <div class="p-4 text-center font-jacques text-lg text-[#5c4430] font-semibold">
                    Wedding Attire
                </div>
            </div>

            <!-- Emcee & Entertainment -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform hover:scale-105 cursor-pointer service-trigger"
                 data-title="Emcee & Entertainment"
                 data-description="Professional emcees, live bands, DJs, and cultural performers for your event."
                 data-img="https://placehold.co/600x600/png">
                <img src="https://placehold.co/600x600/png" alt="Emcee & Entertainment" class="w-full h-64 object-cover">
                <div class="p-4 text-center font-jacques text-lg text-[#5c4430] font-semibold">
                    Emcee & Entertainment
                </div>
            </div>

        </div>
    </div>
</div>

    

    {{-- Soft divider --}}
    <div class="section-divider" data-aos="zoom-in"></div>

    {{-- Other Services --}}
    <div class="other-services" data-aos="fade-up">
        <h2>Other Services</h2>
        <div class="other-grid">
            <div class="other-item" data-aos="zoom-in" data-aos-delay="100">
                <img src="https://placehold.co/600x400/png" alt="Ramadan Buffet">
                <div>Ramadan Buffet</div>
            </div>
            <div class="other-item" data-aos="zoom-in" data-aos-delay="200">
                <img src="https://placehold.co/600x400/png" alt="Engagement">
                <div>Engagement</div>
            </div>
            <div class="other-item" data-aos="zoom-in" data-aos-delay="300">
                <img src="https://placehold.co/600x400/png" alt="Aqiqah">
                <div>Aqiqah</div>
            </div>
            <div class="other-item" data-aos="zoom-in" data-aos-delay="400">
                <img src="https://placehold.co/600x400/png" alt="Party">
                <div>Party</div>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div id="service-modal" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 max-w-md w-full relative shadow-xl">
        <button id="service-close" class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-2xl">&times;</button>
        <img id="service-modal-image" src="" class="w-full h-48 object-cover rounded mb-4" />
        <h2 id="service-modal-title" class="text-xl font-bold mb-2"></h2>
        <p id="service-modal-desc" class="text-gray-700 text-sm leading-relaxed"></p>
    </div>
</div>


@endsection
