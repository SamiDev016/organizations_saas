<nav class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-lg font-bold">Organisations SaaS</div>
        <div>
            @auth
                <a href="{{ route('dashboard') }}" class="mr-4 hover:underline">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="mr-4 hover:underline">Login</a>
                <a href="{{ route('register') }}" class="hover:underline">Register</a>
            @endauth
        </div>
    </div>
</nav>
