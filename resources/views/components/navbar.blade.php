<header class="bg-white shadow-md sticky top-0 z-50" x-data="{ navOpen: false }">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo2.jpg') }}" alt="My Sanding Logo" class="h-12 w-50">
        </a>




        <!-- Hamburger Button (Mobile) -->
        <button @click="navOpen = !navOpen" class="md:hidden text-[#000000] focus:outline-none">
            <!-- Hamburger Icons -->
            ...
        </button>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex space-x-1 text-sm font-medium text-[#000000]" style="font-family: 'Inria Serif', serif;">
            <a href="{{ route('home') }}"
            class="px-4 py-2 border-b-2 transition-all duration-300 {{ request()->routeIs('home') ? 'border-[#c8a97e]' : 'border-transparent hover:border-[#c8a97e]' }}">
            Home
            </a>
            <a href="{{ route('about') }}"
            class="px-4 py-2 border-b-2 transition-all duration-300 {{ request()->routeIs('about') ? 'border-[#c8a97e]' : 'border-transparent hover:border-[#c8a97e]' }}">
            About Us
            </a>
            <a href="{{ route('services') }}"
            class="px-4 py-2 border-b-2 transition-all duration-300 {{ request()->routeIs('services') ? 'border-[#c8a97e]' : 'border-transparent hover:border-[#c8a97e]' }}">
            Services
            </a>
            <a href="{{ route('gallery') }}"
            class="px-4 py-2 border-b-2 transition-all duration-300 {{ request()->routeIs('gallery') ? 'border-[#c8a97e]' : 'border-transparent hover:border-[#c8a97e]' }}">
            Gallery
            </a>
            <a href="{{ route('clients') }}"
            class="px-4 py-2 border-b-2 transition-all duration-300 {{ request()->routeIs('clients') ? 'border-[#c8a97e]' : 'border-transparent hover:border-[#c8a97e]' }}">
            Our Clients
            </a>
            <a href="{{ route('slots') }}"
            class="px-4 py-2 border-b-2 transition-all duration-300 {{ request()->routeIs('slots') ? 'border-[#c8a97e]' : 'border-transparent hover:border-[#c8a97e]' }}">
            Available Slot
            </a>
            <a href="{{ route('contact') }}"
            class="px-4 py-2 border-b-2 transition-all duration-300 {{ request()->routeIs('contact') ? 'border-[#c8a97e]' : 'border-transparent hover:border-[#c8a97e]' }}">
            Contact Us
            </a>
        </nav>
    </div>

    <!-- Mobile Nav -->
    <div x-show="navOpen" x-transition... class="md:hidden px-6 pb-4 bg-white border-t border-gray-200 text-[#000000] font-medium"
         style="font-family: 'Inria Serif', serif;">
        <a href="{{ route('home') }}" class="block py-2 hover:text-[#000000]">Home</a>
        <a href="{{ route('about') }}" class="block py-2 hover:text-[#000000]">About Us</a>
        <a href="{{ route('services') }}" class="block py-2 hover:text-[#000000]">Services</a>
        <a href="{{ route('gallery') }}" class="block py-2 hover:text-[#000000]">Gallery</a>
        <a href="{{ route('clients') }}" class="block py-2 hover:text-[#000000]">Our Clients</a>
        <a href="{{ route('slots') }}" class="block py-2 hover:text-[#000000]">Available Slot</a>
        <a href="{{ route('contact') }}" class="block py-2 hover:text-[#000000]">Contact Us</a>
    </div>
</header>
