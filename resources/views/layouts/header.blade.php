<nav class="bg-white shadow-md border-b border-gray-200">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <!-- Logo and Title -->
        <div class="flex items-center space-x-3 cursor-pointer" onclick="window.location.href = '{{ route('homepage') }}'">
            <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-14 h-auto">
            <span class="text-xl sm:text-2xl font-semibold text-gray-800">Organisations SaaS</span>
        </div>

        <!-- Navigation Links -->
        <div class="flex items-center space-x-4 text-sm sm:text-base">
            @auth
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600 transition">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-500 transition">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 transition">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600 transition">Register</a>
            @endauth
            <a href="{{ route('organisation-request') }}" class="text-gray-700 hover:text-indigo-600 transition">Organisation Request</a>
        </div>
    </div>
</nav>
