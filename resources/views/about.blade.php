@extends('layouts.base')

@section('title', 'About Us')

@section('content')

    {{-- Hero Banner --}}
    <section class="bg-[#D8B57F] py-16 text-center">
        <h1 class="text-4xl font-bold text-black mb-2">About Us</h1>
        <p class="text-lg italic text-black/80">
            More than planners — we are storytellers, crafting weddings that reflect your love.
        </p>
    </section>

    {{-- About Section --}}
    <section class="py-16 bg-[#FFFBF0] px-6 md:px-12">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-start">
            {{-- Images Grid --}}
            <div class="grid grid-cols-2 gap-4">
                {{-- Placeholder for large image spanning two rows --}}
                {{-- Large top image spanning both columns --}}
                <div class="row-span-2 ">
                    <img src="https://placehold.co/200x200" alt="About image" class="rounded shadow w-full object-cover" />
                </div>

                <div class="row-span-1 col-span-1">
                    <img src="https://placehold.co/300x200" alt="About image" class="rounded shadow w-full object-cover" />
                </div>

                <div class="start-row-2 start-cols-1 row-span-2 col-span-1">
                    <img src="https://placehold.co/200x200" alt="About image" class="rounded shadow w-full object-cover" />
                </div>
            
                 <div class="row-span-1 col-span-1">
                    <img src="https://placehold.co/300x200" alt="About image" class="rounded shadow w-full object-cover" />
                </div>
                
            
            
                </div>

            {{-- Text Content --}}
            <div class="text-black space-y-6">
                <h2 class="text-3xl font-bold">MySanding Bridal</h2>
                <p class="italic text-gray-700 leading-relaxed">
                    Welcome to MySanding Bridal Services! We specialize in providing personalized bridal consultations, fittings, and premium makeup services to make your big day unforgettable.
                </p>

                {{-- Optional CTA Placeholder or Logo --}}
                    <br>
                    <a href="/services">
                        <button class="h-10 w-40 bg-gray-300 hover:bg-gray-400 text-black font-semibold rounded-full">
                            View Our Services
                        </button>
                    </a>
                

                <p class="text-3xl font-bold text-black mt-6">History MySanding</p>
                <p class="text-gray-700 leading-relaxed">
                    Established in 2023, MySanding Bridal Services was born out of a passion for creating unforgettable bridal experiences. Our founder, with over a decade of experience in the bridal industry, envisioned a service that combines personalized attention with high-quality offerings.
                    <br><br>
                    From our humble beginnings, we have grown into a trusted name in bridal services, known for our attention to detail and commitment to excellence. We believe that every bride deserves a unique and memorable experience, and we strive to make that a reality with each consultation and fitting.
                </p>    

            
            </div>
        </div>
    </section>

   {{-- Teams Section --}}
    <section class="bg-[#D8B57F] py-16 text-center">
        <h2 class="text-3xl font-bold mb-8">Teams</h2>

        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-6">
            @foreach($teams as $member)
                <div class="rounded-md shadow overflow-hidden bg-white">
                    @if ($member->photo)
                        <img src="{{ $member->photo }}" alt="{{ $member->name }}" class="w-full h-64 object-cover">
                    @else
                        <img src="https://via.placeholder.com/300x300?text=No+Photo" alt="No Image" class="w-full h-64 object-cover">
                    @endif

                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $member->name }}</h3>
                        <p class="text-gray-500">{{ $member->role }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


@endsection
