<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-poppins text-gray-900 antialiased bg-gray-100 h-screen overflow-hidden">
    <div class="h-full w-full flex flex-col p-4 sm:p-6 justify-between">
        
        <div class="flex items-center shrink-0">
            <img src="{{ asset('images/logo_dost.png') }}" alt="DOST Logo" class="h-10 w-auto mr-3">
            <div class="flex flex-col">
                <h2 class="font-bold text-lg leading-none uppercase">DOST</h2>
                <h1 class="font-regular text-sm leading-none uppercase">Bicol</h1>
                <p class="text-[9px] sm:text-[10px] font-bold tracking-tight leading-none mt-1">
            OneDOST4U: Solutions and Opportunities
        </p>
            </div>
        </div>

        <div class="flex-1 flex items-center justify-center py-2">
            <div class="z-10 w-full max-w-lg bg-white shadow-2xl rounded-[2rem] border border-gray-100 relative overflow-hidden flex flex-col">
                
                <div class="w-full h-14 sm:h-13 shrink-0" 
                     style="background-image: url('{{ asset('images/dost_bar.png') }}'); 
                            background-size: cover; 
                            background-repeat: no-repeat;
                            background-position: center;">
                    </div>

                <div class="px-8 sm:px-12 pb-6 pt-4">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <div class="shrink-0 text-center text-[9px] py-2">
            <p>© 2026 All rights reserved</p>
            <p>Developed by Department of Science and Technology - Regional Office V</p>
            <p>Management Information Services Unit</p>
        </div>
    </div>
</body>
</html>