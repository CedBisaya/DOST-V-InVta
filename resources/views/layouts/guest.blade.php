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
    <body class="font-sans text-gray-900 antialiased">
    <body class="font-poppins text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col justify-start items-center bg-gray-100 px-4 sm:px-0 pt-20">

            <!-- Login / Verification Box -->
            <div class="w-full max-w-md sm:max-w-lg md:max-w-xl bg-white shadow-lg rounded-lg p-8 sm:p-10 flex flex-col justify-between">
                {{ $slot }}
            </div>

            <!-- Footer below the box -->
            <p class="text-center text-xs text-black-400 mt-6 sm:mt-8">
                © 2026 All rights reserved<br>
                Developed by Department of Science and Technology - Regional Office V<br>
                Management Information Services Unit
            </p>

        </div>
</body>
</body>
</html>
