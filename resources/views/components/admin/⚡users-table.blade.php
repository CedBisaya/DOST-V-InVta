<?php

use Livewire\Component;

new class extends Component {
    public $search = '';

    
    public function with(): array
    {

        $allUsers = [
            ['id' => 1, 'name' => 'Maria Clara', 'email' => 'maria@clara.ph', 'scope' => 'Internal', 'role' => 'Event Manager', 'created_at' => now()],
            ['id' => 2, 'name' => 'Padre Damaso', 'email' => 'damaso@confess.ph', 'scope' => 'Internal', 'role' => 'Staff Marsahal', 'created_at' => now()],
            ['id' => 3, 'name' => 'Crisostomo Ibarra', 'email' => 'ibarra@revenge.ph', 'scope' => 'Internal', 'role' => 'Participant', 'created_at' => now()],
            ['id' => 4, 'name' => 'Sisa', 'email' => 'nasaan@anak.ko', 'scope' => 'Internal', 'role' => 'Participant', 'created_at' => now()],
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
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight">Users</h2>
                    <p class="text-cyan-500 font-medium text-sm mt-1">Here is a list of all accounts</p>
                </div>

                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 w-full lg:w-auto">
                    <button onclick="" 
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

            <div class="overflow-auto h-auto">
                <table class="table table-hover min-w-full border-spacing-y-1 bg-white text-left">
                    <thead class="bg-dost-cyan border border-gray-200">
                        <tr class="text-md text-white">
                            <th class="px-6 py-4 font-semibold ">Id</th>
                            <th class="px-6 py-4 font-semibold ">Name</th>
                            <th class="px-6 py-4 font-semibold ">Email</th>
                            <th class="px-6 py-4 font-semibold">Scope</th>
                            <th class="px-6 py-4 font-semibold ">Role</th>
                            <th class="px-6 py-4 font-semibold ">Date</th>
                            <th class="px-6 py-4 font-semibold ">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse($users as $user)
                            <tr class="hover:bg-dost-light transition-colors text-sm text-text-color">
                                <td class="px-6 py-4">{{ $user['id'] }}</td>
                                <td class="px-6 py-4 ">{{ $user['name'] }}</td>
                                <td class="px-6 py-4">{{ $user['email'] }}</td>
                                <td class="px-6 py-4">{{ $user['scope'] }}</td>
                                <td class="px-6 py-4">{{ $user['role'] }}</td>
                                <td class="px-6 py-4">{{ $user['created_at']->format('M d, Y') }}</td>
                                <td class="px-6 py-4">
                                    <a href="#" class="inline-block p-2 text-dost-cyan rounded-lg transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
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