@extends('dashboard.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800 text-center px-6">National Admin Dashboard</h1>
    <p>Organisation: {{ $organistaion->name }}</p>
    <p>Branch: {{ $branch->name }}</p>
    <p>User: {{ $user->name }}</p>
</div>

@endsection
