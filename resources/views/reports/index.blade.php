@extends('layouts.app')

@section('content')
<div class="w-full max-w-6xl mx-auto pb-10 px-4">
    {{-- Main Card Wrapper: Walang overflow padding para makasagad ang elements --}}
    <div class="bg-white rounded-[1rem] md:rounded-[1.5rem] shadow-sm border border-gray-100 overflow-hidden">
        
        <div class="py-8 md:py-10">
            
            {{-- Header Section: Full width with horizontal padding --}}
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-10 w-full px-6 md:px-8 lg:px-10">
                <div>
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight">Reports</h2>
                    <p class="text-cyan-500 font-medium text-sm mt-1">Here is a list of all events</p>
                </div>  

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 w-full lg:w-auto">
                    {{-- Search Bar --}}
                    <div class="relative flex-grow sm:min-w-[280px]">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </span>
                        <input type="text" placeholder="Search events..." 
                               class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                    </div>

                    {{-- Date Filter --}}
                    <div class="flex items-center text-[12px] whitespace-nowrap self-end sm:self-auto">
                        <span class="text-gray-400">Filter by :</span>
                        <div class="flex items-center ml-2 relative group cursor-pointer bg-gray-50 px-4 py-2.5 rounded-xl hover:bg-gray-100 transition-all border border-transparent">
                            <span id="dateDisplay" class="font-bold text-gray-700 group-hover:text-dost-cyan transition-colors mr-2">
                                mm/dd/yyyy
                            </span>
                            
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-dost-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>

                            <input type="date" id="dateInput" class="absolute inset-0 opacity-0 cursor-pointer w-full"
                                   onchange="document.getElementById('dateDisplay').innerText = this.value || 'mm/dd/yyyy'">
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left min-w-[800px]">
                    <thead>
                        <tr class="text-white bg-dost-cyan">
                            {{-- Uppercase and tracked headers --}}
                            <th class="px-8 py-4 font-bold text-xs uppercase tracking-widest">Event Name</th>
                            <th class="px-8 py-4 font-bold text-xs uppercase tracking-widest">Date</th>
                            <th class="px-8 py-4 font-bold text-xs uppercase tracking-widest">Event Manager</th>
                            <th class="px-8 py-4 font-bold text-xs uppercase tracking-widest text-center">Venue</th>
                            <th class="px-8 py-4 font-bold text-xs uppercase tracking-widest text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-8 py-5 text-sm font-bold text-gray-700">{{ $user->event_name ?? 'Annual Science Forum' }}</td>
                                <td class="px-8 py-5 text-sm text-gray-500 font-medium">Oct 24, 2025</td>
                                <td class="px-8 py-5 text-sm text-gray-600 font-bold italic">{{ $user->name }}</td>
                                <td class="px-8 py-5 text-center text-sm text-gray-500">PICC, Manila</td>
                                <td class="px-8 py-5 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button title="Download PDF" class="p-2 text-red-400 hover:bg-red-50 rounded-lg transition-all active:scale-90">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </button>
                                        <button title="View Details" class="p-2 text-dost-cyan hover:bg-cyan-50 rounded-lg transition-all active:scale-90">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-20 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div class="p-4 bg-gray-50 rounded-full text-gray-200">
                                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-gray-500 font-black text-sm uppercase tracking-widest">No Reports found</p>
                                            <p class="text-gray-400 text-xs">There are no event records available.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination Footer --}}
            <div class="mt-8 mx-6 md:mx-8 lg:mx-10 p-4 border-t border-gray-50 flex flex-col md:flex-row items-center justify-between bg-gray-50/30 rounded-2xl gap-4">
                <p class="text-[11px] text-gray-400 font-bold uppercase tracking-widest text-center md:text-left">
                    Showing data <span class="text-gray-600">{{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }}</span> of {{ $users->total() ?? 0 }} results
                </p>
                
                <div class="flex items-center space-x-1 shrink-0">
                    @if ($users->onFirstPage())
                        <span class="px-3 py-1.5 text-gray-300 rounded-lg text-xs cursor-not-allowed">&lt;</span>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" class="px-3 py-1.5 text-gray-500 hover:bg-white hover:shadow-sm rounded-lg text-xs transition-all border border-transparent">&lt;</a>
                    @endif

                    <button class="px-4 py-1.5 bg-dost-cyan text-white shadow-md rounded-lg text-xs font-black">
                        {{ $users->currentPage() }}
                    </button>

                    @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="px-3 py-1.5 text-gray-500 hover:bg-white hover:shadow-sm rounded-lg text-xs transition-all border border-transparent">&gt;</a>
                    @else
                        <span class="px-3 py-1.5 text-gray-300 rounded-lg text-xs cursor-not-allowed">&gt;</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection