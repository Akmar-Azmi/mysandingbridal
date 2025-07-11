<footer class="bg-[#fef8fb] border-t border-[#f1e7e5] text-[#5c4430] text-sm pt-12 pb-6 font-[Poppins]">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10 text-center md:text-left">

        <!-- Logo + Description -->
        <div class="space-y-4">
            <div class="bg-[#c5c4cc] w-24 h-10 mx-auto md:mx-0 rounded flex items-center justify-center text-white font-bold text-sm">
                logo
            </div>
            <p class="text-xs text-[#6c5f5b] leading-relaxed max-w-xs mx-auto md:mx-0">
                We create unforgettable memories with elegance and love.
            </p>
            <div class="flex justify-center md:justify-start space-x-4 text-xl text-[#da4a80]">
                <a href="#"><i class="fa-brands fa-instagram hover:text-[#c5c4cc]"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok hover:text-[#c5c4cc]"></i></a>
                <a href="#"><i class="fa-brands fa-facebook hover:text-[#c5c4cc]"></i></a>
            </div>
        </div>

        <!-- Quick Links -->
        <div>
            <h4 class="font-semibold text-[#da4a80] mb-3 tracking-wide">Quick Links</h4>
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="hover:text-[#c5c4cc]">Home</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-[#c5c4cc]">About Us</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-[#c5c4cc]">Services</a></li>
                <li><a href="{{ route('gallery') }}" class="hover:text-[#c5c4cc]">Gallery</a></li>
                <li><a href="{{ route('clients') }}" class="hover:text-[#c5c4cc]">Our Clients</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-[#c5c4cc]">Contact Us</a></li>
            </ul>
        </div>

        <!-- Contact Info -->
        <div>
            <h4 class="font-semibold text-[#da4a80] mb-3 tracking-wide">Contact Us</h4>
            <ul class="space-y-2 text-[#6c5f5b] text-[15px]">
                <li><i class="fa-solid fa-phone text-[#da4a80] mr-2"></i> +60 1946445 (Kak Lina)</li>
                <li><i class="fa-solid fa-envelope text-[#da4a80] mr-2"></i> alyaa.irdina@example.com</li>
                <li><i class="fa-solid fa-location-dot text-[#da4a80] mr-2"></i> Terengganu, Malaysia</li>
            </ul>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="text-center mt-10 text-xs text-[#a59b9b] px-4 leading-relaxed">
        © 2025 MySanding Bridal. All rights reserved.
    </div>
</footer>
