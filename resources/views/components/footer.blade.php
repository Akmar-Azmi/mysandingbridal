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
            <div class="flex justify-center md:justify-start space-x-4 text-xl text-[#000000]">
                <a href="https://www.instagram.com/mysanding_bridal?igsh=MXc1amp2anNrNmxlcg==" target="_blank" aria-label="Instagram">
                    <i class="fa-brands fa-instagram hover:text-[#c5c4cc]"></i>
                </a>
                <a href="https://www.tiktok.com/@mysandingbridal?_t=ZS-8xwZHUPSw5v&_r=1" target="_blank" aria-label="TikTok">
                    <i class="fa-brands fa-tiktok hover:text-[#c5c4cc]"></i>
                </a>
                <a href="https://www.facebook.com/share/19epKZj2Gz/?mibextid=wwXIfr" target="_blank" aria-label="Facebook">
                    <i class="fa-brands fa-facebook hover:text-[#c5c4cc]"></i>
                </a>
            </div>
        </div>

        <!-- Quick Links -->
        <div>
            <h4 class="font-semibold text-[#5c4430] mb-3 tracking-wide">Quick Links</h4>
                        <div class="grid grid-cols-2 gap-x-5">
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:underline">About Us</a></li>
                    <li><a href="{{ route('services') }}" class="hover:underline">Services</a></li>
                </ul>
                <ul class="space-y-4">
                    <li><a href="{{ route('clients') }}" class="hover:underline">Our Clients</a></li>
                    <li><a href="{{ route('gallery') }}" class="hover:underline">Gallery</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:underline">Contact Us</a></li>
                </ul>
            </div>
        </div>

        <!-- Contact Info -->
        <div>
            <h4 class="font-semibold text-[#5c4430] mb-3 tracking-wide">Contact Us</h4>
            <ul class="space-y-3 text-gray-700">
                <li class="flex items-center gap-2">
                    <i class="fab fa-whatsapp text-green-600"></i>
                    <a href="https://wa.me/60198446545" target="_blank">+60 19-8446545 (Lina)</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:info@example.com">linamysanding@gmail.com</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt"></i>
                    <a href="https://www.google.com/maps?q=your+company+location" target="_blank">23B Jalan Perdana 6<br>Pusat Perniagaan Slim Perdana<br>Slim River, Perak</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="text-center mt-10 text-xs text-[#a59b9b] px-4 leading-relaxed">
        © 2025 MySanding Bridal. All rights reserved.
    </div>
</footer>
