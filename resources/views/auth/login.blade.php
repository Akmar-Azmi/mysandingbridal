<x-guest-layout>
    <h2 class="text-xl font-bold mt-6 mb-1">Log In</h2>
    <p class="text-sm mb-4 text-black/70">Welcome to the Admin Dashboard</p>

    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/user.png') }}" alt="User Icon" class="h-16 w-16">
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4 text-left">
            <label for="email" class="text-sm font-semibold">Username</label>
            <input id="email" type="email" name="email" required autofocus
                   class="w-full mt-1 rounded-full p-2 px-4 border-none focus:ring-2 focus:ring-yellow-700 shadow-sm">
        </div>

        <div class="mb-4 text-left">
            <label for="password" class="text-sm font-semibold">Password</label>
            <input id="password" type="password" name="password" required
                   class="w-full mt-1 rounded-full p-2 px-4 border-none focus:ring-2 focus:ring-yellow-700 shadow-sm">
        </div>

        <div class="text-sm text-left text-black mb-4">
            <a href="{{ route('password.request') }}" class="hover:underline">Forgot Password?</a>
        </div>

        <button type="submit"
                class="w-full bg-[#FF5C00] text-white rounded-full py-2 font-semibold hover:bg-orange-600">
            Login
        </button>

        <p class="mt-4 text-sm text-center text-black">
            Not an admin?
            <a href="{{ route('register') }}" class="font-semibold underline">Sign Up</a>
        </p>
    </form>
</x-guest-layout>
