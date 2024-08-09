<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="max-w-7xl mx-auto bg-blue-50 shadow rounded-b">
            <nav class="p-4 flex flex-row justify-between">
                <div class="flex gap-8">
                    <a href="{{ route('guest-products.index') }}">Shop</a>
                    <a href="{{ route('guest-sellers.index') }}">Pārdevēji</a>
                </div>
                <div class="flex gap-8">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            </nav>
        </div>

        <main class="max-w-7xl mx-auto py-6 px-4">
            {{ $slot }}
        </main>
    </body>
</html>
