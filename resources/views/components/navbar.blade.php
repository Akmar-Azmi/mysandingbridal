<header class="bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between px-6 py-4">
        <div class="font-bold text-xl">logo</div>
        <nav class="space-x-6 text-sm font-medium">
            <a href="{{ route('home') }}" class="hover:text-yellow-700">Home</a>
            <a href="{{ route('about') }}" class="hover:text-yellow-700">About Us</a>
            <a href="{{ route('services') }}" class="hover:text-yellow-700">Services</a>
            <a href="{{ route('gallery') }}" class="hover:text-yellow-700">Gallery</a>
            <a href="{{ route('clients') }}" class="hover:text-yellow-700">Our Clients</a>
            <a href="{{ route('slots') }}" class="hover:text-yellow-700">Available Slot</a>
            <a href="{{ route('contact') }}" class="hover:text-yellow-700">Contact Us</a>
        </nav>
        <a href="{{ route('book') }}" class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-4 py-2 rounded-full border border-black">
            Book Appointment
        </a>
    </div>
</header>
