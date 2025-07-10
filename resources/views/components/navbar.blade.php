<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo -->
        <div class="text-2xl font-serif font-extrabold text-[#5c4430] tracking-wide">
            MySanding Bridal
        </div>

        <!-- Hamburger Button (Mobile) -->
        <button @click="navOpen = !navOpen" class="md:hidden text-[#5c4430] focus:outline-none">
            <svg x-show="!navOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="navOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex space-x-6 text-sm font-medium text-[#5c4430]">
            <a href="{{ route('home') }}" class="hover:text-[#c8a97e]">Home</a>
            <a href="{{ route('about') }}" class="hover:text-[#c8a97e]">About Us</a>
            <a href="{{ route('services') }}" class="hover:text-[#c8a97e]">Services</a>
            <a href="{{ route('gallery') }}" class="hover:text-[#c8a97e]">Gallery</a>
            <a href="{{ route('clients') }}" class="hover:text-[#c8a97e]">Our Clients</a>
            <a href="{{ route('slots') }}" class="hover:text-[#c8a97e]">Available Slot</a>
            <a href="{{ route('contact') }}" class="hover:text-[#c8a97e]">Contact Us</a>
        </nav>
    </div>

    <!-- Mobile Nav -->
    <div x-show="navOpen" x-transition class="md:hidden px-6 pb-4 bg-white border-t border-gray-200 text-[#5c4430] font-medium">
        <a href="{{ route('home') }}" class="block py-2 hover:text-[#c8a97e]">Home</a>
        <a href="{{ route('about') }}" class="block py-2 hover:text-[#c8a97e]">About Us</a>
        <a href="{{ route('services') }}" class="block py-2 hover:text-[#c8a97e]">Services</a>
        <a href="{{ route('gallery') }}" class="block py-2 hover:text-[#c8a97e]">Gallery</a>
        <a href="{{ route('clients') }}" class="block py-2 hover:text-[#c8a97e]">Our Clients</a>
        <a href="{{ route('slots') }}" class="block py-2 hover:text-[#c8a97e]">Available Slot</a>
        <a href="{{ route('contact') }}" class="block py-2 hover:text-[#c8a97e]">Contact Us</a>
    </div>
</header>
