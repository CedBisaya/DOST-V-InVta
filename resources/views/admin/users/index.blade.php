<x-app-layout>
<div class="w-full max-w-6xl mx-auto pb-10 px-4">
    <div class="bg-white rounded-[2rem] md:rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 md:p-8 lg:p-10">
            
            {{-- Header Section --}}
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-10">
                <div>
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight">Users</h2>
                    <p class="text-cyan-500 font-medium text-sm mt-1">Here is a list of all accounts</p>
                </div>

                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 w-full lg:w-auto">
                    <button onclick="window.location='{{ route('users.create') }}'" 
                        class="w-full sm:w-auto bg-dost-cyan hover:bg-dost-blue text-white px-6 py-2.5 rounded-xl font-bold text-sm transition-all shadow-md active:scale-95 whitespace-nowrap">
                        + Create Account
                    </button>

                    <div class="relative w-full sm:min-w-[250px]">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </span>
                        <input type="text" placeholder="Search" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-cyan-500 outline-none">
                    </div>

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
            <div class="overflow-x-auto rounded-xl">
                <table class="w-full text-left min-w-[600px]">
                    <thead>
                        <tr class="text-white bg-dost-cyan">
                            <th class="px-6 py-4 font-bold text-sm rounded-l-xl">Name</th>
                            <th class="px-6 py-4 font-bold text-sm">Role</th>
                            <th class="px-6 py-4 font-bold text-sm">Email</th>
                            <th class="px-6 py-4 font-bold text-sm text-center">Status</th>
                            <th class="px-6 py-4 font-bold text-sm text-center rounded-r-xl">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @for($i = 0; $i < 10; $i++)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-5 text-sm font-bold text-gray-700">#</td>
                                <td class="px-6 py-5 text-sm text-gray-500 font-medium capitalize">#</td>
                                <td class="px-6 py-5 text-sm text-gray-500">vakla</td>
                                <td class="px-6 py-5 text-center">
                                    <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-wider">
                                        vakla
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <a href="#" class="inline-block p-2 text-dost-cyan hover:bg-cyan-50 rounded-lg transition-all active:scale-90">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endfor
                        {{--@empty
                            <tr>
                                <td colspan="5" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div class="p-4 bg-gray-50 rounded-full text-gray-200">
                                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        </div>
                                        <p class="text-gray-500 font-black text-sm uppercase tracking-widest">No Users found</p>
                                        <p class="text-gray-400 text-xs">There are no records to display.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse --}}
                    </tbody>
                </table>
            </div>

            {{-- Table Pagination Footer: ALWAYS VISIBLE
            <div class="mt-8 p-4 border-t border-gray-50 flex flex-col md:flex-row items-center justify-between bg-gray-50/30 rounded-2xl gap-4">
                <p class="text-[11px] text-gray-400 font-bold uppercase tracking-widest text-center md:text-left">
                    Showing data 
                    <span class="text-gray-600">
                        {{-- Gamit ang ?? fallback para hindi mag-error pag 0 data 
                        {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }}
                    </span> 
                    of {{ $users->total() ?? 0 }} results
                </p>
                
                <div class="flex items-center space-x-1 shrink-0 overflow-x-auto pb-2 md:pb-0">
                    
                    {{-- Previous Button 
                    @if ($users->onFirstPage())
                        <span class="px-3 py-1.5 text-gray-300 rounded-lg text-xs border border-transparent">&lt;</span>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" class="px-3 py-1.5 text-gray-500 hover:bg-white hover:shadow-sm rounded-lg text-xs transition-all border border-transparent">&lt;</a>
                    @endif

                    {{-- Page 1 (Static highlight pag empty o page 1) 
                    <button class="px-4 py-1.5 {{ $users->currentPage() <= 1 ? 'bg-dost-cyan text-white shadow-md' : 'text-gray-500' }} rounded-lg text-xs font-black">1</button>

                    {{-- Next Button 
                    @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="px-3 py-1.5 text-gray-500 hover:bg-white hover:shadow-sm rounded-lg text-xs transition-all border border-transparent">&gt;</a>
                    @else
                        <span class="px-3 py-1.5 text-gray-300 rounded-lg text-xs border border-transparent">&gt;</span>
                    @endif
                </div>
            </div>--}}
        </div>
    </div>
</div>
</x-app-layout>