<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'InVta') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-layout-color h-screen antialiased overflow-hidden" x-data="{ sidebarOpen: window.innerWidth > 1024 }">
    
    <div class="flex h-full overflow-hidden">
        
        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col min-w-0 h-full overflow-hidden">
            
            @include('layouts.header')

            <main class="flex-1 overflow-y-auto bg-gray-50 px-6 lg:px-10 pb-10 pt-4 custom-scrollbar">
                <div class="max-w-[1600px] mx-auto">
                    {{ $slot }}
                </div>
            </main>

        </div> 
    </div> 
</body>
</html>