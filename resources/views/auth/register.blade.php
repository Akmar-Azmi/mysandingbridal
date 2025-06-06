<x-guest-layout>
    <h2 class="text-xl font-bold mt-6 mb-4">Sign Up</h2>

    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/user.png') }}" alt="User Icon" class="h-16 w-16">
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4 text-left">
            <label for="name" class="text-sm font-semibold">Username</label>
            <input id="name" type="text" name="name" required
                   class="w-full mt-1 rounded-full p-2 px-4 border-none focus:ring-2 focus:ring-yellow-700 shadow-sm">
        </div>

        <div class="mb-4 text-left">
            <label for="email" class="text-sm font-semibold">Email</label>
            <input id="email" type="email" name="email" required
                   class="w-full mt-1 rounded-full p-2 px-4 border-none focus:ring-2 focus:ring-yellow-700 shadow-sm">
        </div>

        <div class="mb-4 text-left">
            <label for="password" class="text-sm font-semibold">Password</label>
            <input id="password" type="password" name="password" required
                   class="w-full mt-1 rounded-full p-2 px-4 border-none focus:ring-2 focus:ring-yellow-700 shadow-sm">
        </div>

        <div class="mb-6 text-left">
            <label for="password_confirmation" class="text-sm font-semibold">Recreate Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   class="w-full mt-1 rounded-full p-2 px-4 border-none focus:ring-2 focus:ring-yellow-700 shadow-sm">
        </div>

        <button type="submit"
                class="w-full bg-[#FF5C00] text-white rounded-full py-2 font-semibold hover:bg-orange-600">
            Sign Up
        </button>

        <p class="mt-4 text-sm text-center text-black">
            Already an Admin?
            <a href="{{ route('login') }}" class="font-semibold underline">Log In</a>
        </p>
    </form>
</x-guest-layout>
