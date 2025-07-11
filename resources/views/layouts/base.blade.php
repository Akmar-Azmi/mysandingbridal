<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MySanding Bridal')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">


</head>
<body class="bg-[#ffffff] text-gray-800 font-sans">

    {{--  NAVBAR --}}
    @include('components.navbar')

    {{--  PAGE CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{--  FOOTER (optional) --}}
    @include('components.footer')

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    @stack('scripts')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="{{ asset('js/event-modal.js') }}"></script>
    <script src="{{ asset('js/service-modal.js') }}"></script>
    
    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 1000,       // animation duration in ms
        once: false,          // false = animate every time on scroll
        mirror: true          // true = animate on scroll up
    });
    </script>
</body>
</html>
