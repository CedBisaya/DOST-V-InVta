<div class="bg-blue-50/50 border border-blue-100 rounded-lg p-4 mb-6 flex items-start">
    <svg class="w-5 h-5 text-cyan-500 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <p class="text-sm text-gray-500">Please note that you must enter your current password before creating a new password.</p>
</div>

<form method="post" action="{{ route('password.update') }}" class="space-y-6">
    @csrf
    @method('put')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Current Password --}}
        <div>
            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-tight mb-1">Current Password<span class="text-red-500">*</span></label>
            <div class="relative group">
                <input type="password" id="current_password" name="current_password"
                       class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all pr-10 @error('current_password', 'updatePassword') border-red-500 @enderror">
                <button type="button" onclick="togglePassword('current_password', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-cyan-500 transition-colors">
                    <svg class="w-5 h-5 eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18M9.88 9.88a3 3 0 104.24 4.24M10.73 5.08A10.43 10.43 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.057 10.057 0 01-1.563 3.029m-5.858 1.091A10.03 10.03 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.059 10.059 0 011.563-3.029" />
                    </svg>
                </button>
            </div>
            @error('current_password', 'updatePassword') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
        </div>

        {{-- New Password --}}
        <div>
            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-tight mb-1">New Password<span class="text-red-500">*</span></label>
            <div class="relative group">
                <input type="password" id="password" name="password" 
                       class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all pr-10 @error('password', 'updatePassword') border-red-500 @enderror">
                <button type="button" onclick="togglePassword('password', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-cyan-500 transition-colors">
                    <svg class="w-5 h-5 eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18M9.88 9.88a3 3 0 104.24 4.24M10.73 5.08A10.43 10.43 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.057 10.057 0 01-1.563 3.029m-5.858 1.091A10.03 10.03 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.059 10.059 0 011.563-3.029" />
                    </svg>
                </button>
            </div>
            @error('password', 'updatePassword') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
        </div>

        {{-- Confirm Password --}}
        <div>
            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-tight mb-1">Confirm Password<span class="text-red-500">*</span></label>
            <div class="relative group">
                <input type="password" id="password_confirmation" name="password_confirmation" 
                       class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all pr-10">
                <button type="button" onclick="togglePassword('password_confirmation', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-cyan-500 transition-colors">
                    <svg class="w-5 h-5 eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18M9.88 9.88a3 3 0 104.24 4.24M10.73 5.08A10.43 10.43 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.057 10.057 0 01-1.563 3.029m-5.858 1.091A10.03 10.03 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.059 10.059 0 011.563-3.029" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="flex justify-end mt-8">
        <button type="submit" class="bg-dost-cyan hover:bg-dost-blue text-white font-bold py-2.5 px-8 rounded-lg text-xs uppercase tracking-widest transition-all shadow-md active:scale-95">
            Save Changes
        </button>
    </div>
</form>

{{-- SUCCESS MODAL --}}
@if(session('status') === 'password-updated')
<div id="success-modal" class="fixed inset-0 flex items-center justify-center z-[100] transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-[2px]"></div>
    <div class="bg-white rounded-[2.5rem] shadow-2xl p-10 max-w-sm w-full mx-4 relative flex flex-col items-center">
        <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="w-24 h-24 rounded-full border-[6px] border-green-500 flex items-center justify-center mb-6">
            <svg class="w-14 h-14 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <h3 class="text-[24px] font-black text-green-500 tracking-tight text-center leading-tight">
            Password Updated Successfully!
        </h3>
    </div>
</div>
@endif