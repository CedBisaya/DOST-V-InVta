    @extends('layouts.app')

    @section('content')
    <div class="max-w-5xl mx-auto pb-10 px-4">
        <div class="mb-6">
            <a href="{{ route('users.index') }}" class="flex items-center text-gray-400 hover:text-cyan-500 transition-colors font-bold text-xs uppercase tracking-widest">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Return
            </a>
        </div>

        {{-- First Card: Update User Account --}}
        <div class="bg-white rounded-[1rem] shadow-sm border border-gray-100 p-6 md:p-8 mb-6">
            <h2 class="text-xl md:text-2xl font-black text-gray-800 tracking-tight mb-8">Update User Account</h2>

            <form method="post" action="{{ route('users.update', $user->id) }}" class="space-y-6">
                @csrf
                @method('patch')

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-gray-500 mb-1">First Name <span class="text-red-500">*</span></label>
                        <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" required
                            class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-gray-500 mb-1">Middle Name</label>
                        <input type="text" name="middle_name" value="{{ old('middle_name', $user->middle_name) }}"
                            class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-gray-500 mb-1">Last Name <span class="text-red-500">*</span></label>
                        <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" required
                            class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-gray-500 mb-1">Suffix</label>
                        <select name="suffix" class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all bg-white cursor-pointer">
                            <option value="" {{ old('suffix', $user->suffix) == '' ? 'selected' : '' }}>N/A</option>
                            <option value="Jr." {{ old('suffix', $user->suffix) == 'Jr.' ? 'selected' : '' }}>Jr.</option>
                            <option value="Sr." {{ old('suffix', $user->suffix) == 'Sr.' ? 'selected' : '' }}>Sr.</option>
                            <option value="II" {{ old('suffix', $user->suffix) == 'II' ? 'selected' : '' }}>II</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10">
                    <div class="w-full md:max-w-md">
                        <label class="block text-xs font-bold text-gray-500 mb-1">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 mb-1">Event Role <span class="text-red-500">*</span></label>
                        <div class="flex flex-wrap items-center gap-6 mt-3">
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="role" value="external" {{ $user->role == 'external' ? 'checked' : '' }} class="w-4 h-4 text-cyan-500 border-gray-300 focus:ring-cyan-400">
                                <span class="ml-2 text-sm text-gray-600 group-hover:text-cyan-500 transition-colors">External</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="role" value="internal" {{ $user->role == 'internal' ? 'checked' : '' }} class="w-4 h-4 text-cyan-500 border-gray-300 focus:ring-cyan-400">
                                <span class="ml-2 text-sm text-gray-600 group-hover:text-cyan-500 transition-colors">Internal</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end items-center mt-8 pt-4">
                    <button type="submit" class="w-full md:w-auto bg-dost-cyan hover:bg-dost-blue text-white font-bold py-2.5 px-8 rounded-lg text-xs uppercase tracking-widest transition-all shadow-md active:scale-95">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        {{-- Deactivate Card --}}
        <div class="bg-white rounded-[1rem] shadow-sm border border-gray-100 p-6 md:p-8">
            <h2 class="text-xl md:text-2xl font-black text-gray-800 tracking-tight mb-6">Deactivate Account</h2>
            <div class="flex items-start space-x-2 mb-6">
                <div class="shrink-0 mt-0.5">
                    <svg class="w-5 h-5 text-[#00B4D8]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="text-gray-400 text-[13px] leading-snug">Check the box below if you want to disable this account.</p>
            </div>

            <form action="{{ route('users.deactivate', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div x-data="{ isChecked: false }" class="flex flex-col md:flex-row md:justify-between md:items-end gap-6">
                    <label class="flex items-start space-x-3 cursor-pointer">
                        <input type="checkbox" x-model="isChecked" class="mt-1 w-5 h-5 rounded border-gray-300 text-cyan-500 focus:ring-cyan-400">
                        <div class="select-none">
                            <span class="block text-cyan-500 font-bold">Disable Account</span>
                            <span class="block text-gray-400 text-sm italic max-w-md">Please note: if this option is checked, the user will not be able to log in until re-enabled.</span>
                        </div>
                    </label>
                    <button type="submit" 
                            :disabled="!isChecked"
                            class="w-full md:w-auto bg-[#FF3333] hover:bg-red-600 text-white px-8 py-2.5 rounded-lg font-bold text-xs uppercase tracking-widest transition-all shadow-md disabled:opacity-50 disabled:cursor-not-allowed whitespace-nowrap">
                        Deactivate Account
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endsection