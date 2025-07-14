<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MySanding Bridal')</title>

    <!-- ✅ AlpineJS (ONLY ONCE) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- ✅ Tailwind (ONLY ONCE) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts & External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- ✅ x-cloak support to prevent flicker -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Your Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#ffffff] text-gray-800 font-sans">

    {{-- ✅ NAVBAR --}}
    @include('components.navbar')

    {{-- ✅ PAGE CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- ✅ FOOTER --}}
    @include('components.footer')

    <!-- ✅ External JS Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: false,
            mirror: true
        });
    </script>

    <!-- ✅ Custom Modal Scripts -->
    <script src="{{ asset('js/event-modal.js') }}"></script>
    <script src="{{ asset('js/service-modal.js') }}"></script>

    {{-- ✅ Page-specific scripts --}}
    @stack('scripts')
</body>

</html>
