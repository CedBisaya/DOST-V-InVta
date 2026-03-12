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

     @php
        $navItems = [
            ['name' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'heroicon-o-squares-2x2'],
            ['name' => 'Users', 'route' => 'users.index', 'icon' => 'heroicon-o-users'],
            ['name' => 'Reports', 'route' => 'reports.index', 'icon' => 'heroicon-o-document-chart-bar'],
            ['name' => 'Logs', 'route' => 'logs.index', 'icon' => 'heroicon-o-clock'],
        ];
    @endphp

    {{-- Navigation Items --}}
    <nav class="flex-1 mt-3 space-y-0.5 overflow-y-auto custom-scrollbar overflow-x-hidden">
        @foreach($navItems as $item)
            @php 
                $isActive = request()->routeIs($item['route']) || 
                            ($item['name'] == 'Users' && str_contains(request()->route()->getName(), 'users.')); 
            @endphp
            
            <a href="{{ route($item['route']) }}" 
                @click="if(window.innerWidth < 1024) sidebarOpen = false"
                class="group relative flex items-center px-3 py-2.5 transition-all duration-200 overflow-hidden
                        {{ $isActive ? 'bg-dost-hover text-dost-cyan' : 'text-gray-500 hover:bg-dost-hover hover:text-dost-cyan' }}">
                
                <div class="flex items-center justify-center shrink-0 w-6">
                      {{-- Render the Heroicon dynamically --}}
                    <x-dynamic-component 
                        :component="$item['icon']" 
                        class="w-5 h-5 transition-colors {{ $isActive ? 'text-dost-cyan' : 'text-gray-400 group-hover:text-dost-cyan' }}" 
                    />
                </div>
                
                <span class="ml-4 text-[13px] font-medium tracking-wide whitespace-nowrap transition-all duration-300"
                        x-show="sidebarOpen"
                        :class="sidebarOpen ? 'opacity-100' : 'lg:hidden opacity-0 w-0 ml-0'">
                    {{ $item['name'] }}
                </span>

                <div class="absolute left-0 w-1 h-5 bg-dost-cyan rounded-r-full transition-opacity {{ $isActive ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }}"></div>
            </a>
        @endforeach
    </nav>

    {{-- Logout Section --}}
    <div class="shrink-0 border-t border-gray-100 overflow-hidden bg-white">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
                <button type="submit" class="group flex items-center px-3 py-4 w-full text-gray-500 hover:text-red-600 hover:bg-red-50 transition-all duration-200">
                <div class="flex items-center justify-center shrink-0 w-6">
                    <x-heroicon-s-arrow-left-on-rectangle class="w-5 h-5 text-gray-400 group-hover:text-red-600 transition-colors" />
                </div>
                <span class="ml-4 text-[13px] font-bold whitespace-nowrap" x-show="sidebarOpen">Sign Out</span>
            </button>
        </form>
    </div>
</aside>