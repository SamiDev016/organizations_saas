@extends('dashboard.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800 text-center px-6">Organisations</h1>
    <a href="{{ route('dashboard.superadmin.organisations.requests') }}" 
       class="mx-6 my-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white text-sm font-semibold rounded-lg shadow transition">
        Show Requests
    </a>
</div>

<table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg overflow-hidden">
    <thead class="bg-gray-100 border-b border-gray-200">
        <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Logo</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Name</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Type</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Email</th>
            <th class="px-6 py-3 text-right text-sm font-medium text-gray-600">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach($organisations as $organisation)
            <tr>
                <td class="px-6 py-4 text-sm text-gray-800">
                    @if($organisation->logo)
                        <img src="{{ asset('images/organisations_logo/'.$organisation->logo) }}" alt="{{ $organisation->name }}" 
                            class="w-12 h-12 rounded-full border-2 border-gray-200 object-cover">
                    @else
                        <div class="w-12 h-12 rounded-full border-2 border-gray-200 flex items-center justify-center bg-gray-200 text-gray-500">
                            No Logo
                        </div>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $organisation->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ ucfirst($organisation->type) }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $organisation->email }}</td>
                <td class="px-6 py-4 text-right space-x-2">
                    
                    <a href="{{ route('dashboard.superadmin.organisations.show', $organisation->id) }}" 
                        class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded-lg shadow">
                        Details
                    </a>
                    
                    <a href="{{ route('dashboard.superadmin.organisations.edit', $organisation->id) }}" 
                        class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white text-sm rounded-lg shadow">
                        Edit
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
