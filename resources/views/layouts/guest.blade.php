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
        
        <div class="absolute top-4 left-4 sm:top-6 sm:left-6 md:top-8 md:left-8 z-[100] flex flex-row items-center gap-2">
        <img src="{{ asset('asset/DOST_LOGO.png') }}" 
            alt="Logo" 
            class="w-[60px] h-[60px] md:w-[80px] md:h-[80px] object-contain">
        
        <div class="flex flex-col justify-center leading-none">
            <p class="font-poppins font-black text-[26px] md:text-[26px] text-slate-900 uppercase tracking-tight">
                DOST
            </p>
            
            <p class="font-poppins font-semibold text-[16px] md:text-[16px] text-slate-800 uppercase">
                BICOL
            </p>
            
            <p class="font-poppins font-black text-[12px] md:text-[20px] text-slate-700 hidden sm:block border-slate-900">
                OneDOST4U: Solutions and Opportunities
            </p>
        </div>
    </div>

        <div class="flex-1 flex items-center justify-center py-2">
            <div class="z-10 w-full max-w-lg bg-white shadow-2xl rounded-[15px] border border-gray-100 relative overflow-hidden flex flex-col">
                
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