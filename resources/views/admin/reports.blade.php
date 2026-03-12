<x-app-layout>
    {{--<livewire:admin.logs-table/>--}}
    <div class="bg-white rounded-xl shadow-sm border mt-8 border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center space-x-3">
                <h3 class="text-xl font-bold text-dost-blue">Reports</h3>
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
                        <th class="pl-8 pr-4 py-4 text-center w-[25%]">Event Name</th>
                        
                        <th class="px-4 py-4 text-center w-[20%]">Event Manager</th>
                        <th class="px-4 py-4 text-center w-[20%]">Location</th>
                        
                        <th class="pl-4 pr-8 py-4 text-center w-[35%]">Status</th>
                        <th class="px-4 py-4 text-center w-[20%]">Date</th>
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
    </div>
</x-app-layout>