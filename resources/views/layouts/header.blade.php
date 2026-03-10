<header class="sticky top-0 z-20 h-16 bg-dost-blue text-white shadow-md shrink-0 transition-all duration-300 ease-in-out">
    <div class="flex justify-between items-center h-full px-4 lg:px-8 w-full">
        
        <div class="flex items-center space-x-4 min-w-0">
            <button @click="sidebarOpen = !sidebarOpen" 
                    class="lg:hidden p-2 rounded-lg hover:bg-white/10 focus:ring-2 focus:ring-white/20 transition-colors shrink-0"
                    aria-label="Toggle Sidebar">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <div class="hidden sm:flex flex-col justify-center shrink-0" 
                 x-data="{ 
                    day: '', 
                    dateStr: '',
                    updateClock() {
                        const now = new Date();
                        this.day = now.toLocaleDateString('en-US', { weekday: 'long' });
                        this.dateStr = now.toLocaleDateString('en-US', { 
                            month: 'short', 
                            day: '2-digit', 
                            year: 'numeric' 
                        }) + ' • ' + now.toLocaleTimeString('en-US', { 
                            hour: '2-digit', 
                            minute: '2-digit', 
                            hour12: true 
                        });
                    }
                 }" 
                 x-init="updateClock(); setInterval(() => updateClock(), 1000)">
                <span class="text-sm font-bold leading-none tracking-tight" x-text="day"></span>
                <span class="text-[10px] font-medium opacity-80 uppercase tracking-wider mt-0.5" x-text="dateStr"></span>
            </div>
        </div>

        <div class="flex items-center space-x-3 lg:space-x-5">
            
            <div class="relative group">
                <button class="p-1.5 rounded-full transition-all focus:outline-none cursor-default">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    
                    <span class="absolute top-1 right-1 flex h-4 w-4">
                        <span class="relative inline-flex rounded-full h-4 w-4 bg-red-600 text-[10px] font-bold items-center justify-center border border-dost-blue">
                            1
                        </span>
                    </span>
                </button>
            </div>

            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none group">
                    <div class="w-9 h-9 bg-white p-0.5 rounded-full shadow-inner flex items-center justify-center shrink-0 group-hover:ring-2 group-hover:ring-white/30 transition-all">
                        <div class="w-full h-full bg-gray-100 rounded-full flex items-center justify-center overflow-hidden">
                            <svg class="w-6 h-6 text-dost-blue" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <div class="text-left hidden md:block">
                        <div class="text-sm lg:text-base font-bold leading-none truncate max-w-[150px]" title="{{ auth()->user()->name }}">
                            {{ auth()->user()->name }}
                        </div>
                        <div class="text-[10px] font-medium opacity-90 mt-1 uppercase tracking-tighter text-blue-100">
                            MIS Unit
                        </div>
                    </div>
                </button>

                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 top-full mt-2 w-44 bg-white rounded-md shadow-lg py-1 z-30 border border-gray-200"
                     style="display: none;">
                    
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                        Profile
                    </a>

                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                        Settings
                    </a>

                    
                </div>
            </div>

        </div>
    </div>
</header>