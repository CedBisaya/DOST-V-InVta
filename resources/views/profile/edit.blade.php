@extends('layouts.app')

@section('content')
<div class="w-full max-w-6xl mx-auto pb-10 px-4 pt-0 -mt-2">
    
    <div class="flex items-center mb-4">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-bold text-gray-400 hover:text-cyan-500 transition-colors">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Return
        </a>
    </div>

    <div class="space-y-5">
        {{-- Profile Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <div class="mb-6">
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight">My Profile</h2>
                    <p class="text-cyan-500 font-medium text-sm mb-8"">Manage and protect your Account</p>
                </div>
                
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Password Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <h2 class="text-2xl font-black text-gray-800 tracking-tight mb-6">Change Password</h2>
                
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>
</div>
@endsection