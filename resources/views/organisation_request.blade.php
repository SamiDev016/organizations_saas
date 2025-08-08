@extends('layouts.app')

@section('content')
<div class="flex flex-row justify-center items-center min-h-screen bg-gradient-to-br from-[#bb6504] via-[#ce8c4e] to-[#deb174] transition-all duration-500">

    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md transition-all duration-300 hover:shadow-2xl">
        <h1 class="text-3xl font-bold text-center mb-6 text-[#bb6504]">{{__('Request To Create Organisation')}}</h1>
        
        <form action="{{ route('organisation-request') }}" method="POST" class="space-y-5">
            @csrf

            <div class="flex flex-col">
                <label for="name" class="mb-1 text-sm font-medium text-gray-700">{{__('Organisation Name')}}</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    required 
                    placeholder="{{__('Enter organisation name')}}"
                    class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#ce8c4e] transition"
                >
            </div>

            <div class="flex flex-col">
                <label for="address" class="mb-1 text-sm font-medium text-gray-700">{{__('Organisation Exact Localization')}}</label>
                <input 
                    type="text" 
                    name="address" 
                    id="address" 
                    required 
                    placeholder="{{__('Enter organisation exact localization')}}"
                    class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#ce8c4e] transition"
                >
            </div>

            <div class="flex flex-col">
                <label for="phone" class="mb-1 text-sm font-medium text-gray-700">{{__('Organisation Phone')}}</label>
                <input 
                    type="text" 
                    name="phone" 
                    id="phone" 
                    required 
                    placeholder="{{__('Enter phone number')}}"
                    class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#ce8c4e] transition"
                >
            </div>

            <div class="flex flex-col">
                <label for="email" class="mb-1 text-sm font-medium text-gray-700">{{__('Organisation Email')}}</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required 
                    placeholder="{{__('example@mail.com')}}"
                    class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#ce8c4e] transition"
                >
            </div>

            <button 
                type="submit" 
                class="w-full py-2 rounded bg-gradient-to-r from-[#ce8c4e] to-[#bb6504] text-black font-semibold hover:opacity-90 transition-all duration-300"
            >
                {{__('Submit')}}
            </button>
        </form>
    </div>
</div>
@endsection
