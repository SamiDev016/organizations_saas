@extends('dashboard.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800 text-center px-6">Branches</h1>
    @foreach ($branches as $branch)
        <p>Branch: {{ $branch->name }}</p>
    @endforeach
</div>

@endsection
