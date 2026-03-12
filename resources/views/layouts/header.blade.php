<header class="sticky top-0 z-20 h-16 bg-dost-blue text-white shadow-md shrink-0 transition-all duration-300 ease-in-out">
    <div class="flex justify-between items-center h-full px-4 lg:px-8 w-full">
        
        <div class="flex items-center space-x-4 min-w-0">
            <button @click="sidebarOpen = !sidebarOpen" 
                    class="lg:hidden p-2 rounded-lg hover:bg-white/10 focus:ring-2 focus:ring-white/20 transition-colors shrink-0"
                    aria-label="Toggle Sidebar">
                <x-heroicon-o-bars-3 class="w-8 h-8 text-gray-500 group-hover:text-red-600 transition-colors" />
            </button>

            <div class="flex flex-col sm:flex-col justify-center shrink-0 w-full sm:w-64" 
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
                    <x-heroicon-o-bell class="w-8 h-8 group-hover:text-blue-600 transition-colors" />
                    
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
                            <x-heroicon-o-user-circle class="w-8 h-8  text-blue-500 group-hover:text-blue-600 transition-colors" />
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