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

</head>
<body class="bg-[#FFFBF0] text-gray-800 font-sans">

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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new Swiper('.myGallerySwiper', {
                    slidesPerView: 'auto',
                    spaceBetween: 30,
                    centeredSlides: true,
                    grabCursor: true,
                    initialSlide: 2,
                });
            });
        </script>

   
</body>
</html>
