<footer class="bg-[#fef8fb] border-t border-[#f1e7e5] text-[#5c4430] text-sm pt-12 pb-6 font-[Poppins]">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10 text-center md:text-left">

        <!-- Logo + Description -->
        <div class="space-y-4">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo2.jpg') }}" alt="My Sanding Logo" class="h-12 mx-auto md:mx-0 text-center mx-auto">
        </a>
            <p class="text-xs font-jacques text-[#6c5f5b] leading-relaxed max-w-xs mx-auto md:mx-0">
                Wedding | Deco | Catering
            </p>

            <div class="flex justify-center md:justify-start space-x-4 text-xl text-[#000000]">
                <a href="https://www.instagram.com/mysanding_bridal?igsh=MXc1amp2anNrNmxlcg==" target="_blank" aria-label="Instagram">
                    <i class="fa-brands fa-instagram hover:text-[#b98421]"></i>
                </a>
                <a href="https://www.tiktok.com/@mysandingbridal?_t=ZS-8xwZHUPSw5v&_r=1" target="_blank" aria-label="TikTok">
                    <i class="fa-brands fa-tiktok hover:text-[#b98421]"></i>
                </a>
                <a href="https://www.facebook.com/share/19epKZj2Gz/?mibextid=wwXIfr" target="_blank" aria-label="Facebook">
                    <i class="fa-brands fa-facebook hover:text-[#b98421]"></i>
                </a>
            </div>

        </div>

        <!-- Quick Links -->
        <div>
            <h4 class="font-semibold text-[#5c4430] mb-4 tracking-wide text-base md:text-lg">Quick Links</h4>
            <div class="grid grid-cols-2 gap-x-5">
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}" class="hover:text-[#b98421] transition">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-[#b98421] transition">About Us</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-[#b98421] transition">Services</a></li>
                </ul>
                <ul class="space-y-4">
                    <li><a href="{{ route('clients') }}" class="hover:text-[#b98421] transition">Our Clients</a></li>
                    <li><a href="{{ route('gallery') }}" class="hover:text-[#b98421] transition">Gallery</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-[#b98421] transition">Contact Us</a></li>
                </ul>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="w-full md:w-auto text-center md:text-left">
            <h4 class="font-semibold text-[#5c4430] mb-4 tracking-wide text-base md:text-lg">Contact Us</h4>
            <ul class="space-y-4 text-brown-600 text-sm">
                <!-- WhatsApp -->
                <li class="flex items-center justify-center md:justify-start gap-2">
                    <a href="https://wa.me/60198446545" target="_blank" aria-label="WhatsApp">
                        <i class="fab fa-whatsapp text-black hover:text-[#b98421] transition text-base"></i>
                    </a>
                    <span>+60 19-8446545 (Lina)</span>
                </li>
                <!-- Email -->
                <li class="flex items-center justify-center md:justify-start gap-2">
                    <a href="mailto:linamysanding@gmail.com" aria-label="Email">
                        <i class="fas fa-envelope hover:text-[#b98421] transition text-base"></i>
                    </a>
                    <span>linamysanding@gmail.com</span>
                </li>
                <!-- Address -->
                <li class="flex items-start justify-center md:justify-start gap-2">
                    <a href="https://www.google.com/maps?q=your+company+location" target="_blank" aria-label="Location">
                        <i class="fas fa-map-marker-alt hover:text-[#b98421] transition text-base mt-1"></i>
                    </a>
                    <div class="leading-relaxed">
                        23B Jalan Perdana 6<br>
                        Pusat Perniagaan Slim Perdana<br>
                        Slim River, Perak
                    </div>
                </li>
            </ul>
        </div>



    <!-- Footer Bottom -->
    <div class="text-center mt-10 text-xs text-[#a59b9b] px-4 leading-relaxed">
        © 2025 MySanding Bridal. All rights reserved.
    </div>
</footer>
