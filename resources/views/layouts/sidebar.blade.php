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
        'w-64 translate-x-0': sidebarOpen, 
        '-translate-x-full lg:translate-x-0 lg:w-[72px]': !sidebarOpen
    }"
>
    <div class="flex items-center justify-between h-16 px-3 shrink-0 overflow-hidden border-b border-gray-50">
        <div class="flex items-center min-w-0">
            <div class="shrink-0 transition-all duration-300" 
                :class="sidebarOpen ? 'opacity-100 w-auto' : 'lg:opacity-0 lg:w-0 overflow-hidden'">
                <img src="{{ asset('images/dost-logo.png') }}" alt="Logo" class="h-16 w-auto object-contain">
            </div>
        </div>
            
        <button @click="sidebarOpen = !sidebarOpen" 
                class="p-2 text-gray-400 focus:outline-none shrink-0 transition-colors rounded-lg">
            <svg class="w-6 h-6 transition-transform duration-300" :class="sidebarOpen ? '' : 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    @php
        $navItems = [
            ['name' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'heroicon-o-squares-2x2'],
            ['name' => 'User', 'route' => 'users.index', 'icon' => 'heroicon-o-users'],
            ['name' => 'Reports', 'route' => 'reports.index', 'icon' => 'heroicon-o-document-chart-bar'],
            ['name' => 'System Logs', 'route' => 'logs.index', 'icon' => 'heroicon-o-clock'],
        ];
    @endphp

    {{-- Navigation Items --}}
    <nav class="flex-1 mt-4 space-y-1 overflow-y-auto custom-scrollbar overflow-x-hidden">
        @foreach($navItems as $item)
            @php 
                $isActive = request()->routeIs($item['route']); 
            @endphp
            
            <div class="relative group/tooltip">
                <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}" 
                    class="flex items-center px-5 py-3 transition-all duration-200
                            {{ $isActive ? 'bg-dost-hover text-dost-cyan' : 'text-gray-500 hover:bg-dost-hover hover:text-dost-cyan' }}">
                    
                    <div class="flex items-center justify-center shrink-0 w-6">
                        <x-dynamic-component 
                            :component="$item['icon']" 
                            class="w-6 h-6 transition-colors {{ $isActive ? 'text-dost-cyan' : 'text-gray-400 group-hover:text-dost-cyan' }}" 
                        />
                    </div>
                    
                    <span class="ml-4 text-[14px] font-medium tracking-wide whitespace-nowrap transition-all duration-300"
                            x-show="sidebarOpen"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-x-2"
                            x-transition:enter-end="opacity-100 translate-x-0">
                        {{ $item['name'] }}
                    </span>

                    {{-- Active Indicator --}}
                    <div class="absolute left-0 w-1.5 h-6 bg-dost-cyan rounded-r-full transition-opacity {{ $isActive ? 'opacity-100' : 'opacity-0' }}"></div>
                </a>

                {{-- Tooltip (Visible only when sidebar is collapsed) --}}
                <div x-show="!sidebarOpen" 
                     class="fixed left-20 ml-2 px-3 py-1.5 bg-gray-800 text-white text-xs rounded-md opacity-0 group-hover/tooltip:opacity-100 pointer-events-none transition-opacity z-50 whitespace-nowrap hidden lg:block">
                    {{ $item['name'] }}
                </div>
            </div>
        @endforeach
    </nav>

    {{-- Sign Out Section --}}
    <div class="shrink-0 border-t border-gray-100 bg-white group/tooltip">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="group flex items-center px-5 py-5 w-full text-gray-500 hover:text-red-600 hover:bg-red-50 transition-all duration-200">
                <div class="flex items-center justify-center shrink-0 w-6">
                    <x-heroicon-s-arrow-left-on-rectangle class="w-6 h-6 text-gray-400 group-hover:text-red-600 transition-colors" />
                </div>
                <span class="ml-4 text-[14px] font-bold whitespace-nowrap transition-all duration-300" x-show="sidebarOpen">Sign Out</span>
            </button>
        </form>
        {{-- Logout Tooltip --}}
        <div x-show="!sidebarOpen" 
             class="fixed left-20 bottom-5 ml-2 px-3 py-1.5 bg-red-600 text-white text-xs rounded-md opacity-0 group-hover/tooltip:opacity-100 pointer-events-none transition-opacity z-50 hidden lg:block">
            Sign Out
        </div>
    </div>
</aside>