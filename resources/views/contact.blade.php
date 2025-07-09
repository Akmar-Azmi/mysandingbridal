@extends('layouts.base')

@section('title', 'Contact Us')

@section('content')
<div class="bg-[#f9f6f2] px-6 py-12">
    <!-- Page Title -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-semibold text-gray-800">Get in Touch With us!</h1>
        <p class="mt-4 text-gray-600 max-w-xl mx-auto">
            We'd love to hear from you and help make your dream wedding a reality!<br>
            Feel free to reach out to us through any of the options below:
        </p>
    </div>

    <!-- Contact Info Row -->
<div class="flex flex-col md:flex-row justify-center items-center gap-10 mb-16">
    <!-- WhatsApp -->
    <div class="flex items-center gap-3">
        <div class="bg-green-500 text-white p-2 rounded-md">
            <i class="fab fa-whatsapp text-xl"></i>
        </div>
        <span class="text-base font-medium text-gray-900">019-123456789</span>
    </div>

    <!-- Email -->
    <div class="flex items-center gap-3">
        <div class="bg-blue-500 text-white p-2 rounded-md">
            <i class="fas fa-envelope text-xl"></i>
        </div>
        <span class="text-base font-medium text-gray-900">kaklina12@gmail.com</span>
    </div>
</div>


    <!-- Map & Address Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 max-w-6xl mx-auto gap-8 items-start">
        <!-- Google Map -->
        <div class="rounded-2xl overflow-hidden shadow-md">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.796290595752!2d101.395!3d3.908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cd99ba11234567%3A0xabcdef1234567890!2sSlim%20River!5e0!3m2!1sen!2smy!4v1688888888888!5m2!1sen!2smy"
                width="100%" height="350" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Address & Hours -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 mb-3">Our Address</h2>
            <p class="text-gray-700 mb-4">Come visit us at:</p>
            <p class="text-sm text-gray-800 mb-6">
                No 23 A B First Floor,<br>
                Pusat Perniagaan Slim Perdana,<br>
                Jalan Perdana 6, Taman Sri Jaya,<br>
                35800 Slim River, Perak
            </p>

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
