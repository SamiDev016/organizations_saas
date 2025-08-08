<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Organisations SaaS') }}</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="flex flex-col min-h-screen w-full">
            @include('dashboard.layouts.header')
            <div class="flex flex-row h-screen">
                @include('dashboard.layouts.sidebar')
                <main class="flex-1 w-4/5">
                    @yield('content')
                </main>
            </div>
            @include('dashboard.layouts.footer')
        </div>
    </body>
</html>
