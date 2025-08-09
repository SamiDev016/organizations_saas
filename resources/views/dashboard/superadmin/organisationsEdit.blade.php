@extends('dashboard.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8 mt-6">
    <h1 class="text-2xl font-bold mb-6">Edit Organisation: {{ $organisation->name }}</h1>

    <form action="{{ route('dashboard.superadmin.organisations.update', $organisation->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-medium mb-1">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $organisation->name) }}" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label for="slug" class="block font-medium mb-1">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $organisation->slug) }}" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label for="logo" class="block font-medium mb-1">Logo</label>
            <input type="file" name="logo" id="logo" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2">
            @if($organisation->logo)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$organisation->logo) }}" alt="Logo" class="h-16">
                </div>
            @endif
        </div>

        <div>
            <label for="color1" class="block font-medium mb-1">Color 1</label>
            <input type="text" name="color1" id="color1" value="{{ old('color1', $organisation->color1) }}" 
                placeholder="#000000"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label for="color2" class="block font-medium mb-1">Color 2</label>
            <input type="text" name="color2" id="color2" value="{{ old('color2', $organisation->color2) }}" 
                placeholder="#FFFFFF"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label for="type" class="block font-medium mb-1">Type</label>
            <select name="type" id="type" value="{{ old('type', $organisation->type) }}" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">
                <option value="free" {{ old('type', $organisation->type) == 'free' ? 'selected' : '' }}>Free</option>
                <option value="premium" {{ old('type', $organisation->type) == 'premium' ? 'selected' : '' }}>Premium</option>
            </select>
        </div>

        <div>
            <label for="description" class="block font-medium mb-1">Description</label>
            <textarea name="description" id="description" rows="3"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">{{ old('description', $organisation->description) }}</textarea>
        </div>

        <div>
            <label for="address" class="block font-medium mb-1">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address', $organisation->address) }}" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label for="phone" class="block font-medium mb-1">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $organisation->phone) }}" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label for="email" class="block font-medium mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $organisation->email) }}" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label for="important_links" class="block font-medium mb-1">Important Links</label>
            <textarea name="important_links" id="important_links" rows="2"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">{{ old('important_links', $organisation->important_links) }}</textarea>
        </div>


        <div class="pt-4">
            <button type="submit" 
                class="bg-blue-500 px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                Update Organisation
            </button>
        </div>
    </form>
</div>

@endsection
