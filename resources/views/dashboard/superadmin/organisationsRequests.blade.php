@extends('dashboard.layouts.app')

@section('content')
@error('error')
    <div class="text-red-500">{{ $message }}</div>
@enderror
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Organisations Requests</h1>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border-b">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border-b">Address</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border-b">Phone</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border-b">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border-b">Status</th>
                    <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800 border-b">{{ $request->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 border-b">{{ $request->address }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 border-b">{{ $request->phone }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 border-b">{{ $request->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 border-b">
                            <span class="px-2 py-1 rounded-full text-xs 
                                {{ $request->status === 'approved' ? 'bg-green-100 text-green-800' : ($request->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($request->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center border-b">
                            <!-- <a href="#" 
                               class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-xs px-4 py-2 rounded mr-2">
                               Show Details
                            </a> -->
                            <form action="{{ route('dashboard.superadmin.organisations.requests.approve', $request->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-blue-500 hover:text-blue-600">
                                    Approve
                                </button>
                            </form>
                            
                            <!-- <form action="{{ route('dashboard.superadmin.organisations.requests.reject', $request->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-block bg-red-500 hover:bg-red-600 text-white text-xs px-4 py-2 rounded">
                                    Reject
                                </button>
                            </form> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


