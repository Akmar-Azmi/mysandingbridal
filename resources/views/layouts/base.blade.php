<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MySanding Bridal')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

</body>
</html>
