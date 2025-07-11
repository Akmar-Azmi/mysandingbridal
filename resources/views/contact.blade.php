@extends('layouts.base')

@section('title', 'Contact Us')

@section('content')

{{-- Hero Banner --}}
<section class="bg-[#D8B57F] py-16 text-center">
    <h1 class="text-4xl font-bold text-black mb-2 font-header">Contact Us</h1>
    <p class="text-lg italic text-black/80">
        We'd love to hear from you and help make your dream wedding a reality! <br>
        Feel free to reach out to us through any of the options below.
    </p>
</section>

<div class="py-12 px-4 sm:px-6 lg:px-8 bg-[#FFFBF0]">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">

        <!-- Map Section (Left Side) -->
        <div class="rounded-xl shadow-2xl overflow-hidden">
            <h2 class="text-xl font-semibold mb-2 font-header">Find us on the map</h2>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.796290595752!2d101.395!3d3.908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cd99ba11234567%3A0xabcdef1234567890!2sSlim%20River!5e0!3m2!1sen!2smy!4v1688888888888!5m2!1sen!2smy"
                width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Get in Touch Section (Right Side) -->
        <div class="bg-white shadow-2xl rounded-xl p-8 space-y-6">
            <p class="text-sm text-gray-700 mb-2">Open Hours: <span class="text-[#f59e0b] font-medium">10AM - 6PM</span></p>

            @php
                use Carbon\Carbon;
                $today = Carbon::now()->format('D');
                $days = [
                    'Mon' => ['label' => 'Mon', 'status' => 'Closed'],
                    'Tue' => ['label' => 'Tue', 'status' => 'Open'],
                    'Wed' => ['label' => 'Wed', 'status' => 'Open'],
                    'Thu' => ['label' => 'Thu', 'status' => 'Open'],
                    'Fri' => ['label' => 'Fri', 'status' => 'Open'],
                    'Sat' => ['label' => 'Sat', 'status' => 'Open'],
                    'Sun' => ['label' => 'Sun', 'status' => 'Open'],
                ];
            @endphp

            <div class="grid grid-cols-7 text-center text-sm font-semibold border border-gray-200 rounded overflow-hidden shadow">
                @foreach($days as $key => $day)
                    <div class="py-2 px-2 relative
                        {{ $key === $today ? 'bg-yellow-300 text-white' : 'bg-gray-100 text-gray-700' }}">
                        @if($key === $today)
                            <span class="absolute -top-4 left-1/2 transform -translate-x-1/2 text-xs font-bold text-[#a855f7]">Today</span>
                        @endif
                        {{ $day['label'] }}<br>
                        <span class="text-xs font-normal 
                            {{ $day['status'] === 'Open' ? ($key === $today ? 'text-white' : 'text-green-700') : 'text-gray-400' }}">
                            {{ $day['status'] }}
                        </span>
                    </div>
                @endforeach
            </div>

            <!-- Updated Contact Info - Icons on Top, No Box -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-4 text-center">
                <!-- Location -->
                <div class="flex flex-col items-center space-y-2">
                    <a href="https://maps.app.goo.gl/Yzbv63efhfx4Tjf16"target="_blank"
                        class="bg-[#FFF4E0] p-4 rounded-full text-orange-500 shadow-md hover:bg-orange-100 transition duration-300">
                            <i class="fas fa-map-marker-alt text-2xl"></i>
                    </a>
                        <h3 class="text-sm font-bold">Location</h3>
                          <p class="text-sm text-gray-800">23B Jalan Perdana 6,
                            Pusat Perniagaan Slim Perdana,<br>
                            Slim River, PERAK</p>
                </div>

                <!-- Email -->
                <div class="flex flex-col items-center space-y-2">
                    <a href="mailto:linamysanding@gmail.com"
                        class="bg-[#FFF4E0] p-4 rounded-full text-orange-500 shadow-md hover:bg-orange-100 transition duration-300">
                        <i class="fas fa-envelope text-2xl"></i>    
                    </a>
                         <p class="text-base font-bold text-gray-800 mt-1">Email Address</p>
                        <p class="text-sm text-gray-700">linamysanding@gmail.com</p>
                </div>

                <!-- Phone -->
                <div class="flex flex-col items-center space-y-2">
                    <a href="https://wa.me/60175771004" target="_blank"
                        class="bg-[#FFF4E0] p-4 rounded-full text-orange-500 shadow-md hover:bg-orange-100 transition duration-300">
                        <i class="fab fa-whatsapp text-2xl"></i>
                    </a>
                        <p class="text-base font-bold text-gray-800">Phone Number</p>
                        <p class="text-sm text-gray-700">
                            +60 17-5771004<br>+60 11-3903 3522
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
