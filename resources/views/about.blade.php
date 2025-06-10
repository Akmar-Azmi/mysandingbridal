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
                @foreach(['a1.jpg', 'a2.jpg', 'a3.jpg', 'a4.jpg', 'a5.jpg'] as $img)
                    <img src="{{ asset('images/about/' . $img) }}" alt="About image" class="rounded shadow">
                @endforeach
            </div>

            {{-- Text Content --}}
            <div class="text-black space-y-6">
                <h2 class="text-3xl font-bold">MySanding Bridal</h2>
                <p class="italic text-gray-700 leading-relaxed">
                    Welcome to MySanding Bridal Services! We specialize in providing personalized bridal consultations, fittings, and premium makeup services to make your big day unforgettable.
                </p>

                {{-- Optional CTA Placeholder or Logo --}}
                <div class="h-10 w-40 bg-gray-300 rounded-full"></div>

                <p class="text-xl text-black mt-6">history mysanding</p>
            </div>
        </div>
    </section>

    {{-- Teams Section --}}
    <section class="bg-[#D8B57F] py-16 text-center">
        <h2 class="text-3xl font-bold mb-8">Teams</h2>
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-6">
            @foreach([1, 2, 3] as $i)
                <div class="bg-[#EDD5A0] h-64 rounded-md shadow"></div>
            @endforeach
        </div>
    </section>

@endsection
