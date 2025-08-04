<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased min-h-screen flex flex-col ">
    <div class="flex-1 bg-gray-100 flex flex-col pt-16 ">
        @if(Auth::check() && Auth::user()->role == 'admin')
        @include('layouts.navadmin')
        @else
        @include('layouts.navigation')
        @endif

        <!-- Page Heading -->
        <!-- @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset -->

        <!-- Page Content -->
        <main class="flex-1">
            {{ $slot }}
        </main>

        <footer class="bg-white shadow mt-6">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-gray-500 text-sm">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>

</html>