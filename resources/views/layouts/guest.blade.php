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

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pirata+One&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="inset-0 bg-no-repeat bg-center bg-cover" style="background-image: url({{ asset('src/gradient.png') }}) ;">

        <!-- Segundo fondo -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('src/fondo.png')}}" alt="Barco" class="w-full h-full object-cover" alt="">
        </div>

        <div class="font-sans text-gray-900 antialiased absolute z-50 w-screen">
            {{ $slot }}
        </div>
    </body>
</html>
