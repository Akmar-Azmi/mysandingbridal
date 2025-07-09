@extends('layouts.base')

@section('content')
<style>
    .wedding-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        max-width: 900px;
        margin: 0 auto;
        padding: 50px 20px;
        text-align: center;
    }

    .service-text-box {
        background-color: #fddc9a;
        padding: 30px 15px;
        font-weight: 600;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .service-img {
        width: 100%;
        height: 160px;
        object-fit: cover;
    }

    .wedding-center-text {
        font-size: 24px;
        font-weight: bold;
        padding: 40px 0;
        grid-column: 2;
    }
</style>

<div class="container">

    {{-- Wedding Services Grid --}}
    <div class="wedding-grid">
        <div class="service-text-box">Wedding Packages</div>
        <img src="https://via.placeholder.com/300x160?text=Venue" class="service-img" alt="Venue">
        <div class="service-text-box">Catering Packages</div>

        <img src="https://via.placeholder.com/300x160?text=Bride+Groom" class="service-img" alt="Wedding Couple">
        <div class="wedding-center-text">Wedding Services</div>
        <img src="https://via.placeholder.com/300x160?text=Catering" class="service-img" alt="Catering">

        <div class="service-text-box">Wedding Attire</div>
        <img src="https://via.placeholder.com/300x160?text=Emcee" class="service-img" alt="Emcee">
        <div class="service-text-box">Emcee & Entertainment</div>
    </div>

</div>
@endsection
