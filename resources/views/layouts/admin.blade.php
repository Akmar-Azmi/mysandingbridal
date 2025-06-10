<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen bg-[#FFFCEB]">

    {{-- Sidebar --}}
    <aside class="w-64 bg-[#FEC64F] p-6 space-y-6 text-black">
        <div class="text-center font-bold text-xl mb-6">
            <div class="bg-gray-300 rounded-md h-16 flex items-center justify-center">LOGO</div>
        </div>

        <nav class="space-y-3">
            <a href="{{ route('admin.dashboard') }}" class="block font-semibold hover:text-white">🏠 Dashboard</a>
            <a href="#" class="block hover:text-white">ℹ️ About Us</a>
            <a href="#" class="block hover:text-white">💼 Services</a>
            <a href="#" class="block hover:text-white">🖼️ Gallery</a>
            <a href="#" class="block hover:text-white">👥 Our Clients</a>
            <a href="#" class="block hover:text-white">📅 Available Slot</a>
            <a href="#" class="block hover:text-white">📞 Contact Us</a>
        </nav>

        <div class="mt-12">
            <h3 class="font-semibold text-sm text-black/70">Setting</h3>
            <a href="#" class="block mt-2 hover:text-white">👤 Admin Profile</a>
        </div>
    </aside>

    {{-- Main Area --}}
    <main class="flex-1 p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">MySanding Bridal</h1>
            <div class="text-sm text-gray-600">👤 Admin</div>
        </div>

        @yield('content')
    </main>

</body>
</html>
