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
            <div class="pl-8 pt-8">
                <h2 class="font-bold text-xl text-dost-blue"> Manage Users</h2>
            </div>
            <div class="grid grid-cols-12 mb-4 space-x-1">
                <div class="col-start-6 col-span-1">
                    <button class="bg-dost-cyan text-white rounded-lg px-3 py-2">Crate</button>
                </div>
                <div class="relative col-start-7 col-span-3 w-full">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400 group-focus-within:text-dost-cyan transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" 
                        wire:model.live="search"
                        name="search"
                        placeholder="Search by name or email..." 
                        class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg leading-5 bg-gray-50/50 placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-1 focus:ring-dost-cyan focus:border-dost-cyan sm:text-sm transition-all shadow-sm"
                    >
                </div>
                <select class="col-start-10 col-span-2 border border-gray-200 px-3 py-2 rounded-xl text-text-color"> 
                    <option value="" class="bg-white text-gray-800">Sort By</option>
                    <option value="1|asc" class="bg-white text-gray-800">Name (A-Z)</option>
                    <option value="1|desc" class="bg-white text-gray-800">Name (Z-A)</option>
                    <option value="4|asc" class="bg-white text-gray-800">Available Date (Asc)</option>
                    <option value="4|desc" class="bg-white text-gray-800">Available Date (Desc)</option>
                    <option value="0|asc" class="bg-white text-gray-800">ID (Asc)</option>
                    <option value="0|desc" class="bg-white text-gray-800">ID (Desc)</option>
                </select>
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
                                <td class="px-6 py-4"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-400 italic">
                                    No data to display...
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