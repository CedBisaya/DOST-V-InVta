{{-- Backdrop Overlay --}}
<div x-show="sidebarOpen" 
     x-transition:enter="transition opacity-300 ease-out"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition opacity-200 ease-in"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="sidebarOpen = false" 
     x-cloak
     class="fixed inset-0 z-40 bg-black/50 lg:hidden">
</div>

<aside 
    x-cloak
    class="fixed inset-y-0 left-0 z-50 bg-white border-r border-gray-100 flex flex-col transition-all duration-300 ease-in-out transform -translate-x-full lg:translate-x-0 lg:static shadow-xl lg:shadow-none"
    :class="{
        'w-52 translate-x-0': sidebarOpen,
        '-translate-x-full lg:translate-x-0 lg:w-16': !sidebarOpen
    }"
>
    {{-- Logo Header --}}
    <div class="flex items-center justify-between h-16 px-4 shrink-0 overflow-hidden border-b border-gray-50">
        <div class="flex items-center min-w-0">
            <div class="shrink-0 transition-all duration-300" 
                 :class="sidebarOpen ? 'opacity-100 w-auto' : 'lg:opacity-0 lg:w-0 overflow-hidden'">
                <img src="{{ asset('images/dost-logo.png') }}" alt="Logo" class="h-14 w-auto object-contain">
            </div>
        </div>
            
        <button @click="sidebarOpen = !sidebarOpen" class="p-1.5 text-gray-400 hover:text-dost-cyan focus:outline-none shrink-0 transition-colors">
            {{-- Desktop Toggle --}}
            <div class="hidden lg:block">
                <svg class="w-5 h-5 transition-transform duration-300" :class="sidebarOpen ? '' : 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>
            {{-- Mobile Close Button --}}
            <div class="lg:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!sidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="sidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
        </button>
    </div>

    {{-- Navigation Items --}}
    <nav class="flex-1 mt-3 space-y-0.5 overflow-y-auto custom-scrollbar overflow-x-hidden">
        @php
            $navItems = [
                ['name' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                ['name' => 'Users', 'route' => 'users', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                ['name' => 'Reports', 'route' => 'reports', 'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['name' => 'Logs', 'route' => 'logs', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
            ];
        @endphp
        
        @foreach($navItems as $item)
        @php
            $active = request()->routeIs($item['route']);
        @endphp
            <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}" 
               class="group relative flex items-center px-3 py-2.5 text-gray-500 transition-all duration-200 {{ $active ? 'bg-dost-hover text-dost-cyan' : 'text-gray-500 hover:bg-dost-hover hover:text-dost-cyan' }} overflow-hidden">
                <div class="flex items-center justify-center shrink-0 w-6">
                    <svg class="w-5 h-5 transition-colors {{ $active ? 'text-dost-cyan' : 'text-gray-400 group-hover:text-dost-cyan' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                    </svg>
                </div>
                
                <span class="ml-4 text-[13px] font-medium tracking-wide whitespace-nowrap transition-all duration-300"
                      x-show="sidebarOpen"
                      :class="sidebarOpen ? 'opacity-100' : 'lg:hidden opacity-0 w-0 ml-0'">
                    {{ $item['name'] }}
                </span>

                <div class="absolute left-0 w-1 h-5 bg-dost-cyan group-hover:opacity-100 rounded-r-full transition-opacity {{ $active ? 'opacity-100' : 'opacity-0' }}"></div>
            </a>
        @endforeach
    </nav>

    <div class="shrink-0 border-t border-gray-100 overflow-hidden bg-white">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                class="group flex items-center px-5 py-4 w-full text-gray-500 hover:text-red-600 hover:bg-red-50 transition-all duration-200 focus:outline-none">
                
                <div class="flex items-center justify-center shrink-0 w-6">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-red-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </div>

                <span class="ml-4 text-[13px] font-bold whitespace-nowrap transition-all duration-300"
                    :class="sidebarOpen ? 'opacity-100 visible' : 'lg:opacity-0 lg:invisible lg:w-0 lg:ml-0'">
                    Sign Out
                </span>
            </button>
        </form>
    </div>
</aside>