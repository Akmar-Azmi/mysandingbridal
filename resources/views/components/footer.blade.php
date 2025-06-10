<footer class="bg-white border-t text-gray-700 text-sm pt-10 pb-6">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">

        {{-- Logo + Desc --}}
        <div class="space-y-2">
            <div class="bg-gray-300 w-20 h-10 mx-auto md:mx-0 rounded flex items-center justify-center">logo</div>
            <p class="text-xs">Lorem ipsum dolor sit amet. Sed aperiam amet est voluptate corrupti</p>
            <div class="flex justify-center md:justify-start space-x-2 text-xl mt-2">
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>

        {{-- Quick Links --}}
        <div>
            <h4 class="font-bold mb-2">Quick Links</h4>
            <ul class="space-y-1">
                <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                <li><a href="{{ route('about') }}" class="hover:underline">About Us</a></li>
                <li><a href="{{ route('services') }}" class="hover:underline">Services</a></li>
                <li><a href="{{ route('gallery') }}" class="hover:underline">Gallery</a></li>
                <li><a href="{{ route('clients') }}" class="hover:underline">Our Clients</a></li>
                <li><a href="{{ route('contact') }}" class="hover:underline">Contact Us</a></li>
            </ul>
        </div>

        {{-- Contact Info --}}
        <div>
            <h4 class="font-bold mb-2">Contact Us</h4>
            <ul class="space-y-1">
                <li>📞 +60 1946445 (Kak Lina)</li>
                <li>✉️ alyaa.irdina@example.com</li>
                <li>📍 Terengganu, Malaysia</li>
            </ul>
        </div>
    </div>

    <div class="text-center mt-6 text-xs text-gray-500">
        © Copyright 2025 | Company Name | All Rights Reserved
    </div>
</footer>
