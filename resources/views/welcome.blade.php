<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to MySanding Bridal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FFFCEB] min-h-screen flex items-center justify-center text-center px-4">

    <div class="bg-white p-10 rounded-xl shadow-lg max-w-lg w-full">
        <h1 class="text-3xl font-bold text-yellow-700 mb-4">Welcome to MySanding Bridal</h1>
        <p class="text-gray-600 mb-6">We curate elegant and flawless wedding moments just for you.</p>

        <a href="{{ route('login') }}"
           class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded-full">
            Admin Login
        </a>
    </div>

</body>
</html>
