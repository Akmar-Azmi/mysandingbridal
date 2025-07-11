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
        grid-template-columns: repeat(3, 200px);
        gap: 25px;
        text-align: center;
    }

    .service-text-box {
        background-color: #F7E7EB; /* Soft pastel blush */
        color: #1E1E1E;
        font-weight: 600;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        aspect-ratio: 1 / 1;
        width: 100%;
        border: 2px solid #D4E6D2; /* soft greenery outline */
    }

    .service-img {
        width: 100%;
        aspect-ratio: 1 / 1;
        object-fit: cover;
        border: 3px solid #FFFFFF;
        border-radius: 4px;
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
        background-color: #FFFFFF;
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
            <div class="wedding-grid" data-aos="fade-up">
                <div class="service-text-box">Wedding Packages</div>
                <img src="https://placehold.co/600x600/png" class="service-img" alt="Venue">
                <div class="service-text-box">Catering Packages</div>

                <img src="https://placehold.co/600x600/png" class="service-img" alt="Wedding Couple">
                <div class="wedding-center-text">Wedding Services</div>
                <img src="https://placehold.co/600x600/png" class="service-img" alt="Catering">

                <div class="service-text-box">Wedding Attire</div>
                <img src="https://placehold.co/600x600/png" class="service-img" alt="Emcee">
                <div class="service-text-box">Emcee & Entertainment</div>
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
@endsection
