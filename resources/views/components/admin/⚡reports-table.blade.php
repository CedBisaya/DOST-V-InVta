<?php

use Livewire\Component;

new class extends Component
{
    public $search = '';

    
    public function with(): array
    {

        $allUsers = [
            ['id' => 1, 'event' => 'Floral Photo shoot', 'name' => 'vakal', 'loc' => 'CS Building 4', 'status' => 'Ended', 'created_at' => now()],
            ['id' => 2, 'event' => 'kosmos vs colored box', 'name' => 'vaklush', 'loc' => 'CS Building 4', 'status' => 'Ended', 'created_at' => now()],
            ['id' => 3, 'event' => 'ador vs francis', 'name' => 'vaklaur', 'loc' => 'CS Building 4', 'status' => 'Ended', 'created_at' => now()],
            ['id' => 4, 'event' => 'block b vs bonjing', 'name' => 'vaks', 'loc' => 'CS Building 4', 'status' => 'Ended', 'created_at' => now()],
        ];

        $filteredUsers = array_filter($allUsers, function($user) {
            return str_contains(strtolower($user['name']), strtolower($this->search));
        });

        return [
            'users' => $filteredUsers,
        ];
    }

    public function render() {
        return <<<'blade'
        <div class="">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between  px-6 py-6 gap-6">
                <div>
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight">Reports</h2>
                    <p class="text-cyan-500 font-medium text-sm mt-1">Here is a list of all events</p>
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

                    <div class="flex items-center whitespace-nowrap self-end sm:self-auto">
                       <input type="date" class="bg-gray-50 py-2.5 rounded-xl text-sm border-none focus:ring-2 focus:ring-cyan-500 outline-none">
                    </div>
                </div>
            </div>

            <div class="overflow-auto h-auto">
                <table class="table table-hover min-w-full border-spacing-y-1 bg-white text-left">
                    <thead class="bg-dost-cyan border border-gray-200">
                        <tr class="text-md text-white">
                            <th class="px-6 py-4 font-semibold ">Id</th>
                            <th class="px-6 py-4 font-semibold ">Event Name</th>
                            <th class="px-6 py-4 font-semibold ">Event Manager</th>
                            <th class="px-6 py-4 font-semibold">Location</th>
                            <th class="px-6 py-4 font-semibold ">Status</th>
                            <th class="px-6 py-4 font-semibold ">Date</th>
                            <th class="px-6 py-4 font-semibold ">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse($users as $user)
                            <tr class="hover:bg-dost-light transition-colors text-sm text-text-color">
                                <td class="px-6 py-4">{{ $user['id'] }}</td>
                                <td class="px-6 py-4 ">{{ $user['event'] }}</td>
                                <td class="px-6 py-4">{{ $user['name'] }}</td>
                                <td class="px-6 py-4">{{ $user['loc'] }}</td>
                                <td class="px-6 py-4">{{ $user['status'] }}</td>
                                <td class="px-6 py-4">{{ $user['created_at']->format('M d, Y') }}</td>
                                <td class="px-6 py-4">
                                    <a href="#" class="inline-block p-2 text-dost-cyan hover:bg-cyan-50 rounded-lg transition-all active:scale-90">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
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
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div> 

        blade;
    }

};
?>
