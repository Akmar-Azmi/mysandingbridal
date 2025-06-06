<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MySanding Bridal Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#FFFCEB] flex items-center justify-center px-4">
    <div class="w-full max-w-md p-8 bg-[#FEC64F] rounded-2xl shadow-lg">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-black mb-1">MySanding Bridal Admin</h1>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
