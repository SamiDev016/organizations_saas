@extends('layouts.app')

@section('content')
<div class="flex flex-row justify-center items-center min-h-screen bg-gradient-to-br from-[#bb6504] via-[#ce8c4e] to-[#deb174] transition-all duration-500">
   
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md transition-all duration-300 hover:shadow-2xl">
        <h1 class="text-3xl font-bold text-center mb-6 text-[#bb6504]">Sign In To Your Account</h1>
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div class="flex flex-col">
                <label for="email" class="mb-1 text-sm font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required 
                    class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#ce8c4e] transition"
                    placeholder="example@mail.com"
                >
            </div>

            <div class="flex flex-col">
                <label for="password" class="mb-1 text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#ce8c4e] transition"
                    placeholder="••••••••"
                >
            </div>

            <button 
                type="submit" 
                class="w-full py-2 rounded bg-gradient-to-r from-[#ce8c4e] to-[#bb6504] text-black font-semibold hover:opacity-90 transition-all duration-300"
            >
                Login
            </button>
        </form>
    </div>
</div>
@endsection
