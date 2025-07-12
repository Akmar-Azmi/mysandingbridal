@extends('layouts.base')

@section('title', 'About Us')

@section('content')

    {{-- Hero Banner --}}
    <section class="bg-gradient-to-l from-[#f6f5f0] to-[#f1e7e5] text-center py-12" data-aos="fade-up">
        <h1 class="text-4xl font-jacques font-semibold text-black mb-2">About Us</h1>
        <p class="text-lg italic text-black/80">
            More than planners — we are storytellers, crafting weddings that reflect your love.
        </p>
    </section>

    {{-- About Section --}}
    <section class="py-16 bg-[#ffffff] px-6 md:px-12">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-start">
            {{-- Images Grid --}}
            <div class="grid grid-cols-2 gap-4" data-aos="fade-right">
                {{-- Placeholder for large image spanning two rows --}}
                {{-- Large top image spanning both columns --}}
                <div class="row-span-2 ">
                    <img src="images/kaklina1.jpg" alt="About image" class="rounded shadow w-full object-cover" />
                </div>

                <div class="row-span-1 col-span-1">
                    <img src="images/main.jpg"" alt="About image" class="rounded shadow w-full object-cover" />
                </div>

                <div class="start-row-2 start-cols-1 row-span-2 col-span-1">
                    <img src="images/hall3.jpg" alt="About image" class="rounded shadow w-full object-cover" />
                </div>
            
                 <div class="row-span-1 col-span-1">
                    <img src="images/impiana.jpg" alt="About image" class="rounded shadow w-full object-cover" />
                </div>
                
            
            
                </div>

            {{-- Text Content --}}
            <div class="text-black space-y-6" data-aos="fade-left">
            <h2 class="text-3xl font-jacques font-medium text-[#5d3c33]">MySanding Bridal</h2>
                <p class="text-lg text-grey/80">
                    Welcome to MySanding Bridal Services! We specialize in providing personalized bridal consultations, fittings, and premium makeup services to make your big day unforgettable.
                </p>

            <a href="/services" class="w-fit inline-block border border-[#b98421] text-[#b98421] px-5 py-2 rounded-full text-sm hover:bg-[#b98421] hover:text-white transition duration-300">
                View Our Services
            </a>

            <h2 class="text-3xl font-jacques font-medium text-[#5d3c33]">History MySanding</h2>
            <p class="text-lg italic text-black/80">
                    Established in 2023, MySanding Bridal Services was born out of a passion for creating unforgettable bridal experiences. Our founder, with over a decade of experience in the bridal industry, envisioned a service that combines personalized attention with high-quality offerings.
                    <br><br>
                    From our humble beginnings, we have grown into a trusted name in bridal services, known for our attention to detail and commitment to excellence. We believe that every bride deserves a unique and memorable experience, and we strive to make that a reality with each consultation and fitting.
                </p>    
            </div>
        </div>
    </section>

   {{-- Teams Section --}}
    <section class="bg-[#fffcf3] py-16 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-jacques font-normal mb-8">Teams</h2>

        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-6">
            @foreach($teams as $member)
                <div class="rounded-md shadow overflow-hidden bg-white">
                    @if ($member->photo)
                        <img src="{{ $member->photo }}" alt="{{ $member->name }}" class="w-full h-64 object-cover">
                    @else
                        <img src="https://via.placeholder.com/300x300?text=No+Photo" alt="No Image" class="w-full h-64 object-cover">
                    @endif

                    <div class="p-4">
                        <h3 class="text-lg font-jacques font-medium">{{ $member->name }}</h3>
                        <p class="text-gray-500">{{ $member->role }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


@endsection
