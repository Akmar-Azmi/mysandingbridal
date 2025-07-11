
<header class="bg-white shadow-md sticky top-0 z-50" x-data="{ navOpen: false }">

<header class="bg-white shadow-md sticky top-0 z-50" style="background-color: #ffffff;">

<header class="bg-white shadow-md sticky top-0 z-50" style="background-color: #ffffff;">

    <div class="container mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Logo -->
        <div class="text-2xl font-serif font-extrabold text-[#000000] tracking-wide">
            MYSANDING
        </div>

        <!-- Hamburger Button (Mobile) -->
        <button @click="navOpen = !navOpen" class="md:hidden text-[#000000] focus:outline-none transition-transform duration-300 ease-in-out hover:scale-110">
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
        <nav class="hidden md:flex space-x-6 text-sm font-medium text-[#000000]">
            <a href="{{ route('home') }}" class="transition-colors duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">Home</a>
            <a href="{{ route('about') }}" class="transition-colors duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">About Us</a>
            <a href="{{ route('services') }}" class="transition-colors duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">Services</a>
            <a href="{{ route('gallery') }}" class="transition-colors duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">Gallery</a>
            <a href="{{ route('clients') }}" class="transition-colors duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">Our Clients</a>
            <a href="{{ route('slots') }}" class="transition-colors duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">Available Slot</a>
            <a href="{{ route('contact') }}" class="transition-colors duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">Contact Us</a>
        </nav>
    </div>

    <!-- Mobile Nav -->
    <div x-show="navOpen" x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden px-6 pb-4 bg-white border-t border-gray-200 text-[#5c4430] font-medium">
        <a href="{{ route('home') }}" class="block py-2 hover:text-[#c8a97e]">Home</a>
        <a href="{{ route('about') }}" class="block py-2 hover:text-[#c8a97e]">About Us</a>
        <a href="{{ route('services') }}" class="block py-2 hover:text-[#c8a97e]">Services</a>
        <a href="{{ route('gallery') }}" class="block py-2 hover:text-[#c8a97e]">Gallery</a>
        <a href="{{ route('clients') }}" class="block py-2 hover:text-[#c8a97e]">Our Clients</a>
        <a href="{{ route('slots') }}" class="block py-2 hover:text-[#c8a97e]">Available Slot</a>
        <a href="{{ route('contact') }}" class="block py-2 hover:text-[#c8a97e]">Contact Us</a>

    <div x-show="navOpen" x-transition class="md:hidden px-6 pb-4 bg-white border-t border-gray-200 text-[#000000] font-medium">
        <a href="{{ route('home') }}" class="block py-2 transition-all duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">Home</a>
        <a href="{{ route('about') }}" class="block py-2 transition-all duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">About Us</a>
        <a href="{{ route('services') }}" class="block py-2 transition-all duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">Services</a>
        <a href="{{ route('gallery') }}" class="block py-2 transition-all duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">Gallery</a>
        <a href="{{ route('clients') }}" class="block py-2 transition-all duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">Our Clients</a>
        <a href="{{ route('slots') }}" class="block py-2 transition-all duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">Available Slot</a>
        <a href="{{ route('contact') }}" class="block py-2 transition-all duration-300 hover:text-[#B68C44] hover:underline underline-offset-4">Contact Us</a>
    </div>
</header>
