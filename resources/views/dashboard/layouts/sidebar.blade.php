<div class="flex flex-col w-1/5 min-h-screen bg-gray-800 text-white shadow-lg">
    <div class="text-2xl font-bold py-6 px-4 border-b border-gray-700">
        Super Admin Dashboard
    </div>
    <ul class="flex flex-col p-4 space-y-3">
        <a href="{{ route('dashboard') }}" 
           class="w-full px-4 py-2 rounded-lg hover:bg-gray-700 transition">
            Home
        </a>
        <a href="{{ route('dashboard.superadmin.organisations') }}" 
           class="w-full px-4 py-2 rounded-lg hover:bg-gray-700 transition">
            Organisations
        </a>
        <a href="{{ route('dashboard.superadmin.users') }}" 
           class="w-full px-4 py-2 rounded-lg hover:bg-gray-700 transition">
            Users
        </a>
    </ul>
</div>
