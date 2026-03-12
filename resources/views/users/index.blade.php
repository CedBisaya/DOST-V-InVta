@extends('layouts.app')

@section('content')
<div class="space-y-10 min-w-0 w-full pt-4 overflow-x-hidden"> {{-- min-w-0 w-full --}} 
    {{-- Main Card Wrapper --}}
    <div class="bg-white rounded-[1rem] md:rounded-[1.5rem] shadow-sm border border-gray-100 overflow-hidden">
        
        <div class="py-10 md:py-10">
            
            {{-- Header Section --}}
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-10 w-full px-6 md:px-8 lg:px-10">
                <div>
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight">Users</h2>
                    <p class="text-cyan-500 font-medium text-sm mt-1">Here is a list of all accounts</p>
                </div>

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 w-full lg:w-auto">
                    {{-- Create Account Button --}}
                    <a href="{{ route('users.create') }}" 
                       class="inline-block text-center bg-dost-cyan hover:bg-dost-blue text-white px-6 py-2.5 rounded-xl font-bold text-sm transition-all shadow-md active:scale-95 whitespace-nowrap">
                        + Create Account
                    </a>

                    {{-- Search Bar --}}
                    <div class="relative flex-grow sm:min-w-[300px]">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </span>
                        <input type="text" placeholder="Search by name or email..." 
                               class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                    </div>

                    {{-- Sort Dropdown --}}
                    <div class="flex items-center text-[12px] whitespace-nowrap self-end sm:self-auto">
                        <span class="text-gray-400">Sort by :</span>
                        <div class="flex items-center ml-2 cursor-pointer group">
                            <span class="font-bold text-gray-700 group-hover:text-dost-cyan transition-colors">Newest</span>
                            <svg class="w-4 h-4 ml-1 text-gray-400 group-hover:text-dost-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Table Section --}}
            <div class="overflow-x-auto w-full">
                <table class="w-full min-w-max text-center border-collapse">
                    <thead>
                        <tr class="text-white bg-dost-cyan uppercase text-[11px] font-black tracking-[0.15em]">
                            {{-- Header cells with white border dividers like in image_7dd7a2.png --}}
                            <th class="px-6 py-4 last:border-r-0">Name</th>
                            <th class="px-6 py-4 last:border-r-0">Role</th>
                            <th class="px-6 py-4 last:border-r-0">Status</th>
                            <th class="px-6 py-4 last:border-r-0">Email</th>
                            <th class="px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-8 py-5 text-sm font-bold text-gray-700">{{ $user->name }}</td>
                                <td class="px-8 py-5 text-sm text-gray-500 font-medium capitalize">{{ $user->role ?? 'Internal' }}</td>
                                <td class="px-8 py-5">
                                    <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase {{ ($user->status ?? 'active') == 'active' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} tracking-wider">
                                        {{ $user->status ?? 'Active' }}
                                    </span>
                                </td>
                                <td class="px-8 py-5 text-sm text-gray-500">{{ $user->email }}</td>
                                <td class="px-8 py-5 text-center">
                                    <a href="{{ route('users.edit', $user->id) }}" class="inline-block p-2 text-dost-cyan hover:bg-cyan-50 rounded-lg transition-all active:scale-90">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-20 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div class="p-4 bg-gray-50 rounded-full text-gray-200">
                                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        </div>
                                        <p class="text-gray-500 font-black text-sm uppercase tracking-widest">No Users found</p>
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
                    @if (!$users->onFirstPage())
                        <a href="{{ $users->previousPageUrl() }}" class="px-3 py-1.5 text-gray-500 hover:bg-white hover:shadow-sm rounded-lg text-xs transition-all border border-transparent">&lt;</a>
                    @else
                        <span class="px-3 py-1.5 text-gray-300 rounded-lg text-xs cursor-not-allowed">&lt;</span>
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