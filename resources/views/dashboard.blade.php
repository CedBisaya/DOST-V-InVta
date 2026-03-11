@extends('layouts.app')

@section('content')
<div class="space-y-6 min-w-0 w-full overflow-x-hidden">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-dost-blue tracking-tight">Dashboard Overview</h2>
        <p class="text-sm text-gray-500">Welcome back, {{ auth()->user()->name }}!</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-4 min-w-0 hover:shadow-md transition-shadow">
            <div class="p-3 bg-orange-100 rounded-lg shrink-0">
                <svg class="w-8 h-8 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider truncate">Total Managers</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800 truncate">{{ $totalManagers ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-4 min-w-0 hover:shadow-md transition-shadow">
            <div class="p-3 bg-indigo-100 rounded-lg shrink-0">
                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider truncate">Total Events</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800 truncate">{{ $totalEvents ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-4 min-w-0 hover:shadow-md transition-shadow">
            <div class="p-3 bg-blue-100 rounded-lg shrink-0">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider truncate">Upcoming</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800 truncate">{{ $upcomingEvents ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-4 min-w-0 hover:shadow-md transition-shadow">
            <div class="p-3 bg-green-100 rounded-lg shrink-0">
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider truncate">Ongoing</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800 truncate">{{ $ongoingEvents ?? 0 }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
       <div class="p-6 border-b border-gray-50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div class="flex items-center space-x-3">
        <h3 class="text-lg font-bold text-dost-blue">Event Manager</h3>
    </div>

    <div class="relative w-full sm:w-64 lg:w-80 group">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-4 w-4 text-gray-400 group-focus-within:text-dost-cyan transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input type="text" 
               name="search"
               placeholder="Search by name or email..." 
               class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg leading-5 bg-gray-50/50 placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-1 focus:ring-dost-cyan focus:border-dost-cyan sm:text-sm transition-all shadow-sm"
        >
    </div>
</div>
        
        <div class="w-full border-t border-gray-50">
    <table class="w-full border-collapse table-fixed"> 
        <thead>
            <tr class="bg-dost-cyan text-white uppercase text-[12px] font-bold tracking-wider">
                <th class="pl-8 pr-4 py-4 text-center w-[25%]">Name</th>
                
                <th class="px-4 py-4 text-center w-[20%]">Role</th>
                <th class="px-4 py-4 text-center w-[20%]">Status</th>
                
                <th class="pl-4 pr-8 py-4 text-center w-[35%]">Email</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($users ?? [] as $user)
                <tr class="hover:bg-dost-hover transition-colors group">
                    <td class="pl-8 pr-4 py-4 font-semibold text-gray-700">
                        <div class="truncate" title="{{ $user->name }}">
                            {{ $user->name }}
                        </div>
                    </td>
                    <td class="px-4 py-4 text-center">
                        <span class="text-[10px] text-gray-600 uppercase font-bold whitespace-nowrap bg-gray-50 px-2.5 py-1 rounded border border-gray-100">
                            Admin
                        </span>
                    </td>
                    <td class="px-4 py-4 text-center">
                        <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-[10px] font-bold uppercase whitespace-nowrap shadow-sm">
                            Active
                        </span>
                    </td>
                    <td class="pl-4 pr-8 py-4 text-sm text-gray-500 font-medium">
                        <div class="truncate" title="{{ $user->email }}">
                            {{ $user->email }}
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center space-y-3">
                            <div class="p-4 bg-gray-50 rounded-full">
                                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-gray-500 font-bold text-sm">No managers found</p>
                                <p class="text-gray-400 text-xs">There are no records to display.</p>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

        <div class="p-4 border-t border-gray-50 flex items-center justify-between bg-gray-50/30 flex-wrap gap-4">
            <p class="text-[11px] text-gray-400 font-bold uppercase tracking-widest whitespace-nowrap">
                Showing data <span class="text-gray-600">1 to {{ count($users ?? []) }}</span> of {{ count($users ?? []) }} results
            </p>
            <div class="flex items-center space-x-1 shrink-0">
                <button class="px-2 py-1 text-gray-400 hover:bg-white hover:shadow-sm rounded text-xs transition-all border border-transparent hover:border-gray-200">&lt;</button>
                <button class="px-3 py-1 bg-dost-cyan text-white rounded text-xs font-bold shadow-sm">1</button>
                <button class="px-2 py-1 text-gray-400 hover:bg-white hover:shadow-sm rounded text-xs transition-all border border-transparent hover:border-gray-200">&gt;</button>
            </div>
        </div>
    </div>

    <footer class="mt-12 pb-6">
        <div class="flex flex-col md:flex-row items-center justify-center space-y-1 md:space-y-0 md:space-x-2 text-[11px] text-gray-500 tracking-wide border-t border-gray-200 pt-6">
            <span class="font-semibold">© {{ date('Y') }} All rights reserved.</span>
            <span class="hidden md:inline text-gray-300">|</span>
            <span>Department of Science and Technology - Region V</span>
            <span class="hidden md:inline text-gray-300">|</span>
            <span class="text-gray-400">MIS Unit</span>
        </div>
    </footer>
    
</div>
@endsection