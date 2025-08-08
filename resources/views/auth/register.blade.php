@extends('layouts.app')

@section('content')

<h1>Register</h1>

<form method="POST" action="{{ route('register.custom') }}">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        @error('name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        @error('email')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        @error('password')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>
    <div>
        @error('password_confirmation')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit">Register</button>
</form>
@endsection