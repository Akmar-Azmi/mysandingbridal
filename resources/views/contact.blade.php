@extends('layouts.base')

@section('title', 'Contact Us')

@section('content')

    {{-- Hero Banner --}}
    <section class="bg-gradient-to-l from-[#f6f5f0] to-[#f1e7e5] text-center py-10" data-aos="fade-up">
        <h1 class="text-4xl font-jacques font-semibold text-black mb-2">Contact Us</h1>
        <p class="text-lg italic text-black/80">
        We'd love to hear from you and help make your dream wedding a reality! <br>
        Feel free to reach out to us through any of the options below.
        </p>
    </section>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-[#ffffff]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">

        <!-- Map Section (Left Side) -->
        <div data-aos="fade-right">
            <h2 class="text-3xl font-jacques font-normal mb-2 font-header">Find us on the map</h2>
            
            <div class="rounded-xl shadow-2xl overflow-hidden">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.796290595752!2d101.395!3d3.908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cd99ba11234567%3A0xabcdef1234567890!2sSlim%20River!5e0!3m2!1sen!2smy!4v1688888888888!5m2!1sen!2smy"
                    width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>


        <!-- Get in Touch Section (Right Side) -->
        <div class="bg-white shadow-2xl rounded-xl p-6 space-y-6" data-aos="fade-left">
            <p class="text-xl text-[#000000] font-jacques mb-2">Open Hours: <span class="text-[#b98421] font-medium">10AM - 6PM</span></p>

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

            <div class="grid grid-cols-7 text-center text-sm font-jacques font-semibold border border-gray-200 rounded overflow-hidden shadow">
                @foreach($days as $key => $day)
                    <div class="py-2 px-2 relative
                        {{ $key === $today ? 'bg-yellow-500 text-white' : 'bg-gray-100 text-gray-700' }}">
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 text-center">
                <!-- Location -->
                <div class="flex flex-col items-center space-y-2">
                    <a href="https://maps.app.goo.gl/Yzbv63efhfx4Tjf16" target="_blank"
                        class="p-2 border border-[#b98421] bg-[#b98421] rounded-full text-white shadow-md hover:bg-white hover:text-[#b98421] transition duration-300 aspect-square flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-2xl"></i>
                    </a>
                        <h3 class="text-base font-jacques font-bold">Location</h3>
                          <p class="text-[#b98421] mb-1">23B Jalan Perdana 6,
                            Pusat Perniagaan<br>
                            Slim Perdana,<br>
                            Slim River, PERAK</p>
                </div>

                <!-- Email -->
                <div class="flex flex-col items-center space-y-2">
                    <a href="mailto:linamysanding@gmail.com"
                        class="p-2 border border-[#b98421] bg-[#b98421] rounded-full text-white shadow-md hover:bg-white hover:text-[#b98421] transition duration-300 aspect-square flex items-center justify-center">
                        <i class="fas fa-envelope text-2xl"></i>    
                    </a>
                         <p class="text-base font-jacques font-bold text-gray-800 mt-1">Email Address</p>
                        <p class="text-[#b98421] mb-1">linamysanding@gmail.com</p>
                </div>

                <!-- Phone -->
                <div class="flex flex-col items-center space-y-2">
                    <a href="https://wa.me/60175771004" target="_blank"
                        class="p-2 border border-[#b98421] bg-[#b98421] rounded-full text-white shadow-md hover:bg-white hover:text-[#b98421] transition duration-300 aspect-square flex items-center justify-center">
                        <i class="fab fa-whatsapp text-2xl"></i>
                    </a>
                        <p class="text-base font-jacques font-bold text-gray-800">Phone Number</p>
                        <p class="text-[#b98421] mb-1">
                            +60 17-5771004<br>+60 11-3903 3522
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
