@extends('layouts.base')

@section('title', 'Contact Us')

@section('content')
<div class="py-12 px-4 sm:px-6 lg:px-8 bg-[#FFFBF0]">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">

        <!-- Map Section (Left Side) -->
        <div class="rounded-xl shadow-2xl overflow-hidden">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.796290595752!2d101.395!3d3.908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cd99ba11234567%3A0xabcdef1234567890!2sSlim%20River!5e0!3m2!1sen!2smy!4v1688888888888!5m2!1sen!2smy"
                width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Get in Touch Section (Right Side) -->
        <div class="bg-white shadow-2xl rounded-xl p-8 space-y-6">
            <h2 class="text-3xl font-semibold text-gray-800">Get in Touch</h2>
            <p class="text-gray-600 text-base">
                We'd love to hear from you and help make your dream wedding a reality!
                Feel free to reach out to us through any of the options below.
            </p>

            <div class="space-y-6">
                <!-- Address -->
                <div class="flex items-start space-x-4">
                    <span><i class="fas fa-map-marker-alt text-xl text-yellow-700 mt-1"></i></span>
                    <div>
                        <p class="font-semibold text-gray-800">Office & Boutique</p>
                        <p class="text-gray-600">23B Jalan Perdana 6,<br>Pusat Perniagaan Slim Perdana, <br> Slim River, PERAK</p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-start space-x-4">
                    <span><i class="fas fa-envelope text-xl text-yellow-700 mt-1"></i></span>
                    <div>
                        <p class="font-semibold text-gray-800">Email Us</p>
                        <p class="text-gray-600">linamysanding@gmail.com</p>
                    </div>
                </div>

                <!-- Phone -->
                <div class="flex items-start space-x-4">
                    <span><i class="fas fa-phone text-xl text-yellow-700 mt-1"></i></span>
                    <div>
                        <p class="font-semibold text-gray-800">Call Us</p>
                        <p class="text-gray-600">+60 17-5771004<br>+60 11-3903 3522</p>
                    </div>
                </div>
            </div>

             <p class="text-sm text-gray-700 mb-2">Open Hours: <span class="text-[#f59e0b] font-medium">10AM - 6PM</span></p>

            <!-- Days Grid -->
            <div class="grid grid-cols-7 text-center text-sm font-semibold">
                <div class="py-2 px-2 bg-gray-100">Mon<br><span class="text-xs font-normal text-gray-400">Closed</span></div>
                <div class="py-2 px-2 bg-gray-100">Tue<br><span class="text-xs font-normal text-green-700">Open</span></div>
                <div class="py-2 px-2 bg-gray-100">Wed<br><span class="text-xs font-normal text-green-700">Open</span></div>
                <div class="py-2 px-2 bg-yellow-300 text-white rounded">Thu<br><span class="text-xs font-normal">Open</span></div>
                <div class="py-2 px-2 bg-gray-100">Fri<br><span class="text-xs font-normal text-green-700">Open</span></div>
                <div class="py-2 px-2 bg-gray-100">Sat<br><span class="text-xs font-normal text-green-700">Open</span></div>
                <div class="py-2 px-2 bg-gray-100">Sun<br><span class="text-xs font-normal text-green-700">Open</span></div>
            </div>
        </div>
    </div>
</div>
@endsection
