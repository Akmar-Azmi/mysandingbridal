@extends('layouts.base')

@section('title', 'Our Clients')

@section('content')
    {{-- Hero Banner --}}
    <section class="bg-gradient-to-l from-[#f6f5f0] to-[#f1e7e5] text-center py-12" data-aos="fade-up">
        <h1 class="text-4xl font-jacques font-semibold text-black mb-2">Our Clients</h1>
        <p class="text-lg italic text-black/80">
            Grateful to the beautiful couples who entrusted us with their forever.
        </p>
    </section>

    <!-- Testimonials Section -->
    <div class="bg-[#ffffff] py-16 px-6 text-center">
        <h2 class="text-3xl font-jacques font-normal text-gray-800 mb-12">What client says...</h2>

        @foreach ($clients as $index => $client)
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-start mb-16 text-left">
               @if ((int) $index % 2 === 0)
                    {{-- Text then Image --}}
                    <div class="space-y-4">
                        <p class="text-lg italic text-black/80">
                            <span class="text-xl text-gray-500 font-serif">❝</span>
                            {{ $client['feedback'] }}
                        </p>
                        <p class="font-jacques font-semibold">– {{ $client['name'] }}</p>
                        <p class="text-sm text-gray-800 font-medium">
                            {{ $client['theme'] }} | {{ $client['venue'] }}
                        </p>
                    </div>
                    <div>
                        <img src="{{ $client['image'] }}" alt="{{ $client['name'] }}"
                            class="rounded-xl shadow-lg w-full object-cover">
                    </div>
                @else
                    {{-- Image then Text --}}
                    <div>
                        <img src="{{ $client['image'] }}" alt="{{ $client['name'] }}"
                            class="rounded-xl shadow-lg w-full object-cover">
                    </div>
                    <div class="space-y-4">
                        <p class="text-lg italic text-black/80">
                            <span class="text-xl text-gray-500 font-serif">❝</span>
                            {{ $client['feedback'] }}
                        </p>
                        <p class="font-jacques font-semibold">– {{ $client['name'] }}</p>
                        <p class="text-sm text-gray-800 font-medium">
                            {{ $client['theme'] }} | {{ $client['venue'] }}
                        </p>
                    </div>
                @endif
            </div>
        @endforeach

        <!-- Rating -->
        <div class="mt-16 text-center">
            <div class="text-yellow-500 text-3xl space-x-1">
                @for ($i = 0; $i < 5; $i++)
                    <i class="fas fa-star"></i>
                @endfor
            </div>
            <p class="mt-2 font-medium text-gray-800">Rated 5 Stars by 98% of Clients</p>
        </div>
    </div>
@endsection
