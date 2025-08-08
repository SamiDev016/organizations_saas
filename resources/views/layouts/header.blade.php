<nav class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between">
        <div class="text-lg font-bold">Organisations SaaS</div>
        <div class="flex items-center space-x-4">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
                <a href="{{ route('register') }}" class="hover:underline">Register</a>
            @endauth
        </div>
    </div>
</nav>
