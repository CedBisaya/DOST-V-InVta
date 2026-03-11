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

    <script>
        (function() {
            const isMobile = window.innerWidth < 1024;
            const savedState = localStorage.getItem('sidebarState');
            
            let initialState;
            if (isMobile) {
                initialState = false;
            } else {
                initialState = savedState === null ? true : savedState === 'true';
            }
            
            if (!initialState && !isMobile) {
                document.documentElement.classList.add('sidebar-collapsed');
            }
            window.initialSidebarState = initialState;
        })();
    </script>

    <style>
        [x-cloak] { display: none !important; }
        
        @media (max-width: 1023px) {
            aside { transform: translateX(-100%) !important; }
            aside.translate-x-0 { transform: translateX(0) !important; }
        }

        @media (min-width: 1024px) {
            .sidebar-collapsed aside { width: 4rem !important; }
            .sidebar-collapsed aside span { display: none !important; }
            .sidebar-collapsed aside .shrink-0 img { opacity: 0; width: 0; }
        }
    </style>
</head>
<body class="bg-gray-100 h-screen antialiased overflow-hidden" 
      x-data="{ sidebarOpen: window.initialSidebarState }" 
      x-init="$watch('sidebarOpen', val => {
          if (window.innerWidth >= 1024) {
              localStorage.setItem('sidebarState', val);
              document.documentElement.classList.toggle('sidebar-collapsed', !val);
          }
      })">
    
    <div class="flex h-full overflow-hidden">
        
        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col min-w-0 h-full overflow-hidden">
            
            @include('layouts.header')

            <main class="flex-1 overflow-y-auto bg-gray-50 px-6 lg:px-10 pb-10 pt-4 custom-scrollbar">
                <div class="max-w-[1600px] mx-auto">
                    @yield('content')
                </div>
        {{-- Page Footer --}}
            <footer class="mt-12 pb-6">
                <div class="flex flex-col md:flex-row items-center justify-center space-y-1 md:space-y-0 md:space-x-2 text-[11px] text-gray-500 tracking-wide border-t border-gray-200 pt-6">
                    <span class="font-semibold">© {{ date('Y') }} All rights reserved.</span>
                    <span class="hidden md:inline text-gray-300">|</span>
                    <span>Department of Science and Technology - Region V</span>
                    <span class="hidden md:inline text-gray-300">|</span>
                    <span class="text-gray-400">MIS Unit</span>
                </div>
            </footer>
            </main>
        </div> 
    </div> 
</body>
</html>