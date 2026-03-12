@extends('layouts.app')

@section('content')
{{-- Ginawang max-w-full para mas malapad ang flexibility, pero ang card ay max-w-6xl --}}
<div class="w-full pb-10">
    
 {{-- Return Button Container: Pantay sa padding ng header (px-4 lg:px-8) --}}
    <div class="flex items-center mb-4">
        <a href="{{ route('users.index') }}" class="inline-flex items-center text-sm font-bold text-gray-400 hover:text-cyan-500 transition-colors">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Return
        </a>
    </div> 

    {{-- Main Card --}}
    <div class="space-y-4 min-w-0 w-full overflow-x-hidden">
        <div class="bg-white rounded-[1rem] shadow-sm border border-gray-100 p-8">
            <h2 class="text-2xl font-black text-gray-800 tracking-tight mb-2">Create Account</h2>
            <p class="text-cyan-500 font-medium text-sm mb-8">Fill out the form below to add new accounts.</p>

            <form action="{{ route('users.store') }}" method="POST" class="space-y-8">
                @csrf
                
                {{-- Event Role Section --}}
                <div class="mb-10">
                    <label class="block text-xs font-bold text-gray-500 mb-4 uppercase tracking-wider">
                        Event Role <span class="text-red-500">*</span>
                    </label>
                    
                    <div class="flex items-center space-x-10 ml-1">
                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="event_role" value="external" required 
                                   class="w-5 h-5 text-cyan-500 border-gray-300 focus:ring-cyan-400 transition-all cursor-pointer">
                            <span class="ml-3 text-sm text-gray-600 group-hover:text-cyan-500 transition-colors font-medium">External</span>
                        </label>

                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="event_role" value="internal" required 
                                   class="w-5 h-5 text-cyan-500 border-gray-300 focus:ring-cyan-400 transition-all cursor-pointer">
                            <span class="ml-3 text-sm text-gray-600 group-hover:text-cyan-500 transition-colors font-medium">Internal</span>
                        </label>
                    </div>
                </div>

                <hr class="border-gray-50">

                {{-- Personal Info Section --}}
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-gray-500 mb-1">First Name <span class="text-red-500">*</span></label>
                        <input type="text" name="first_name" required placeholder="John"
                               class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all bg-gray-50/30">
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-gray-500 mb-1">Middle Initial</label>
                        <input type="text" name="middle_initial" maxlength="2"
                               class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all bg-gray-50/30">
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-gray-500 mb-1">Last Name <span class="text-red-500">*</span></label>
                        <input type="text" name="last_name" required placeholder="Doe"
                               class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all bg-gray-50/30">
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-gray-500 mb-1">Suffix</label>
                        <select name="suffix" class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all bg-white cursor-pointer">
                            <option value="">N/A</option>
                            <option value="Jr.">Jr.</option>
                            <option value="Sr.">Sr.</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                        </select>
                    </div>
                </div>

                {{-- Contact Info Section --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="max-w-md">
                        <label class="block text-xs font-bold text-gray-500 mb-1">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" required placeholder="example@email.com"
                               class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all bg-gray-50/30">
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="flex justify-end items-center space-x-4 mt-8 pt-6 border-t border-gray-50">
                    <a href="{{ route('users.index') }}" class="text-gray-400 hover:text-gray-600 font-bold text-xs uppercase tracking-widest transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="bg-dost-cyan hover:bg-dost-blue text-white font-bold py-2.5 px-8 rounded-lg text-xs uppercase tracking-widest transition-all shadow-md active:scale-95">
                        Add Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection