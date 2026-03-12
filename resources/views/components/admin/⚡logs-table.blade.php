<?php

use Livewire\Component;

new class extends Component
{
    public $search = '';

    
    public function with(): array
    {

        $allUsers = [
            ['id' => 1, 'name' => 'Maria Clara', 'role' => 'event manager', 'activity' => 'Created new event.', 'created_at' => now()],
            ['id' => 2, 'name' => 'Padre Damaso', 'role' => 'staff marshal', 'activity' => 'Sign in to the system', 'created_at' => now()],
            ['id' => 3, 'name' => 'Crisostomo Ibarra', 'role' => 'staff marshal', 'activity' => 'Sign in to the system', 'created_at' => now()],
            ['id' => 4, 'name' => 'Sisa', 'role' => 'event manager', 'activity' => 'Created a new staff marshal', 'created_at' => now()],
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
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight">Activity Logs</h2>
                    <p class="text-cyan-500 font-medium text-sm mt-1">Here is a list of all User's Activity</p>
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

            <div class="overflow-auto h-auto">
                <table class="table table-hover min-w-full border-spacing-y-1 bg-white text-left">
                    <thead class="bg-dost-cyan border border-gray-200">
                        <tr class="text-md text-white">
                            <th class="px-6 py-4 font-semibold ">Id</th>
                            <th class="px-6 py-4 font-semibold ">Name</th>
                            <th class="px-6 py-4 font-semibold ">Role</th>
                            <th class="px-6 py-4 font-semibold">Activity</th>
                            <th class="px-6 py-4 font-semibold ">Date</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse($users as $user)
                            <tr class="hover:bg-dost-light transition-colors text-sm text-text-color">
                                <td class="px-6 py-4">{{ $user['id'] }}</td>
                                <td class="px-6 py-4 ">{{ $user['name'] }}</td>
                                <td class="px-6 py-4">{{ $user['role'] }}</td>
                                <td class="px-6 py-4">{{ $user['activity'] }}</td>
                                <td class="px-6 py-4">{{ $user['created_at']->format('M d, Y') }}</td>
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
