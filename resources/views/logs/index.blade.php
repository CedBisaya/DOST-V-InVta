@extends('layouts.app')

@section('content')
<div class="w-full max-w-6xl mx-auto pb-10 px-4">
    <div class="bg-white rounded-[2rem] md:rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 md:p-8 lg:p-10">
            
            {{-- Header Section --}}
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-10">
                <div>
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight">User Activity Logs</h2>
                    <p class="text-cyan-500 font-regular text-sm mt-1">View the details of each user's activity logs</p>
                </div>  

                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 w-full lg:w-auto">

                    <div class="relative w-full sm:min-w-[250px]">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </span>
                        <input type="text" placeholder="Search" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                    </div>

                    <div class="flex items-center text-[12px] whitespace-nowrap self-end sm:self-auto">
                        <span class="text-gray-400">Filter by :</span>
                        <div class="flex items-center ml-2 relative group cursor-pointer bg-gray-50 px-3 py-1.5 rounded-lg hover:bg-gray-100 transition-all">
                            <span id="dateDisplay" class="font-medium text-gray-700 group-hover:text-dost-cyan transition-colors mr-2">
                                mm/dd/yyyy
                            </span>
                            
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-dost-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>

                            <input type="date" id="dateInput" class="absolute inset-0 opacity-0 cursor-pointer w-full">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Table Section --}}
<div class="overflow-x-auto rounded-xl">
    <table class="w-full text-left min-w-[600px]">
        <thead>
            <tr class="text-white bg-dost-cyan">
                <th class="px-6 py-4 font-bold text-sm rounded-l-xl">ID</th>
                <th class="px-6 py-4 font-bold text-sm">Name</th>
                <th class="px-6 py-4 font-bold text-sm">Role</th>
                <th class="px-6 py-4 font-bold text-sm text-center">Action</th>
                <th class="px-6 py-4 font-bold text-sm text-center rounded-r-xl">Date</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($users as $user)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-5 text-sm font-bold text-gray-700">{{ $user->name }}</td>
                    <td class="px-6 py-5 text-sm text-gray-500 font-medium capitalize">{{ $user->role ?? 'Internal' }}</td>
                    <td class="px-6 py-5 text-sm text-gray-500">{{ $user->email }}</td>
                    <td class="px-6 py-5 text-center">
                        <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase {{ ($user->status ?? 'active') == 'active' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} tracking-wider">
                            {{ $user->status ?? 'Active' }}
                        </span>
                    </td>
                    <td class="px-6 py-5 text-center">
                        <a href="{{ route('users.edit', $user->id) }}" class="inline-block p-2 text-dost-cyan hover:bg-cyan-50 rounded-lg transition-all active:scale-90">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @empty
                {{-- EEMPTY STATE FOR REPORTS --}}
                <tr>
                    <td colspan="5" class="px-6 py-20 text-center">
                        <div class="flex flex-col items-center justify-center space-y-4">
                            <div class="p-4 bg-gray-50 rounded-full text-gray-200">
                                {{-- NEW REPORT/DOCUMENT ICON --}}
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-500 font-black text-sm tracking-widest">No Data found</p>
                                <p class="text-gray-400 text-xs">There are no records to display.</p>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

            {{-- Table Pagination Footer: ALWAYS VISIBLE --}}
            <div class="mt-8 p-4 border-t border-gray-50 flex flex-col md:flex-row items-center justify-between bg-gray-50/30 rounded-2xl gap-4">
                <p class="text-[11px] text-gray-400 font-bold uppercase tracking-widest text-center md:text-left">
                    Showing data 
                    <span class="text-gray-600">
                        {{-- Gamit ang ?? fallback para hindi mag-error pag 0 data --}}
                        {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }}
                    </span> 
                    of {{ $users->total() ?? 0 }} results
                </p>
                
                <div class="flex items-center space-x-1 shrink-0 overflow-x-auto pb-2 md:pb-0">
                    {{-- Ginamit ko ang custom pagination UI mo para laging lumabas ang < 1 > kahit empty --}}
                    
                    {{-- Previous Button --}}
                    @if ($users->onFirstPage())
                        <span class="px-3 py-1.5 text-gray-300 rounded-lg text-xs border border-transparent">&lt;</span>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" class="px-3 py-1.5 text-gray-500 hover:bg-white hover:shadow-sm rounded-lg text-xs transition-all border border-transparent">&lt;</a>
                    @endif

                    {{-- Page 1 (Static highlight pag empty o page 1) --}}
                    <button class="px-4 py-1.5 {{ $users->currentPage() <= 1 ? 'bg-dost-cyan text-white shadow-md' : 'text-gray-500' }} rounded-lg text-xs font-black">1</button>

                    {{-- Next Button --}}
                    @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="px-3 py-1.5 text-gray-500 hover:bg-white hover:shadow-sm rounded-lg text-xs transition-all border border-transparent">&gt;</a>
                    @else
                        <span class="px-3 py-1.5 text-gray-300 rounded-lg text-xs border border-transparent">&gt;</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const dateInput = document.getElementById('dateInput');
    const dateDisplay = document.getElementById('dateDisplay');
    const dateWrapper = dateInput.parentElement;

    const clearBtn = document.createElement('button');
    clearBtn.innerHTML = `
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>`;
    clearBtn.className = "hidden ml-2 text-gray-400 hover:text-red-500 transition-colors z-20";
    clearBtn.type = "button";
    dateWrapper.appendChild(clearBtn);

    dateWrapper.addEventListener('click', function(e) {
        if (e.target.closest('button') === clearBtn) return;
        
        if ('showPicker' in HTMLInputElement.prototype) {
            dateInput.showPicker();
        } else {
            dateInput.focus();
        }
    });

    dateInput.addEventListener('change', function() {
        const dateValue = this.value; 
        if (dateValue) {
            const dateObj = new Date(dateValue);
            
            const mm = String(dateObj.getMonth() + 1).padStart(2, '0');
            const dd = String(dateObj.getDate()).padStart(2, '0');
            const yyyy = dateObj.getFullYear();
            
            dateDisplay.innerText = `${mm}/${dd}/${yyyy}`;
            dateDisplay.classList.add('text-dost-cyan');
        
        } else {
            resetDateFilter();
        }
    });

    // 4. Clear Functionality
    clearBtn.addEventListener('click', function(e) {
        e.stopPropagation(); // Pigilan ang pagbukas ng calendar
        resetDateFilter();
    });

    function resetDateFilter() {
        dateInput.value = ''; 
        dateDisplay.innerText = 'mm/dd/yyyy'; 
        dateDisplay.classList.remove('text-dost-cyan');
        clearBtn.classList.add('hidden');
    }
</script>
@endsection