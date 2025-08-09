@extends('dashboard.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">
        Organisation Details
    </h1>

    <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
        @php
            $color1 = $organisation->color1;
            $color2 = $organisation->color2;
            $important_links = explode(',', $organisation->important_links);
        @endphp
        <!-- use gradient color -->
        <div class=" p-6 flex flex-col md:flex-row items-center gap-6" style="background: linear-gradient(to right, {{ $color1 }}, {{ $color2 }})">
            @if($organisation->logo)
                <img src="{{ asset('images/organisations_logo/'.$organisation->logo) }}" alt="{{ $organisation->name }}" 
                    class="w-24 h-24 rounded-full border-4 border-white shadow-md object-cover">
            @else
                <div class="w-24 h-24 rounded-full border-4 border-white shadow-md flex items-center justify-center bg-gray-200 text-gray-500">
                    No Logo
                </div>
            @endif
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold text-white">{{ $organisation->name }}</h2>
                <p class="text-white/90 capitalize">{{ $organisation->type }}</p>
                <p class="text-white/70 text-sm">Slug: {{ $organisation->slug }}</p>
            </div>
        </div>

        <div class="p-6 space-y-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Contact Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-800">
                    <p><span class="font-medium">Email:</span> {{ $organisation->email }}</p>
                    <p><span class="font-medium">Phone:</span> {{ $organisation->phone }}</p>
                    <p class="md:col-span-2"><span class="font-medium">Address:</span> {{ $organisation->address }}</p>
                </div>
            </div>

            {{-- Description --}}
            @if($organisation->description)
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Description</h3>
                    <p class="text-gray-800">{{ $organisation->description }}</p>
                </div>
            @endif

            {{-- Colors --}}
            @if($organisation->color1 && $organisation->color2)
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Brand Colors</h3>
                    <div class="flex gap-2">
                        <div class="w-8 h-8 rounded shadow" style="background-color: {{ $organisation->color1 }}"></div>
                        <div class="w-8 h-8 rounded shadow" style="background-color: {{ $organisation->color2 }}"></div>
                    </div>
                </div>
            @endif

            {{-- Important Links --}}
            @if($organisation->important_links)
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Important Links</h3>
                    <ul class="list-disc list-inside text-blue-600">
                        @foreach($important_links as $link)
                            <li>
                                <a href="{{ trim($link) }}" target="_blank" class="hover:underline">
                                    {{ trim($link) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- User ID --}}
            <div>
                @php
                    use App\Models\User;
                    $user = User::where('id', $organisation->user_id)->first();
                @endphp
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Owner(s)</h3>
                <p class="text-gray-800">{{ $user->name}}</p>
            </div>

        </div>

        {{-- Actions --}}
        <div class="bg-gray-50 p-6 flex justify-end gap-4 border-t">
            <a href="{{ route('dashboard.superadmin.organisations') }}" 
               class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                Back
            </a>
            <a href="{{ route('dashboard.superadmin.organisations.edit', $organisation->id) }}" 
               class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                Edit
            </a>
        </div>
    </div>
</div>
@endsection
