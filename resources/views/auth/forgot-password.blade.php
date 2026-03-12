<x-guest-layout>

    <div class="mx-auto w-full max-w-[320px] sm:max-w-[500px] mb-4">
        <a href="{{ route('login') }}" class="inline-flex items-center text-xs sm:text-sm font-bold text-gray-400 hover:text-[#00AEEF] transition-colors group">
            <svg class="w-4 h-4 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Return
        </a>
    </div>

    <div class="text-center mb-6">
        <img src="{{ asset('images/dost-logo.png') }}"
             alt="DOST Logo"
             class="mx-auto w-full max-w-[150px] sm:max-w-[180px] h-auto object-contain">

        <p class="font-poppins font-bold text-lg sm:text-[20px] mt-3 text-[#00AEEF] uppercase tracking-wide">
            Account Verification
        </p>
        <p class="text-[10px] sm:text-[11px] font-regular text-gray-600 uppercase tracking-tight">
            (Two Factor Authentication)
        </p>
    </div>
    
    <div class="mx-auto w-full max-w-[320px] sm:max-w-[500px] mb-6 text-xs sm:text-sm text-gray-600 leading-relaxed px-">
        Please enter your <span class="font-regular text-gray-800">Account ID</span> to reset your password. We'll send a 2FA verification code to your registered personal email.
    </div>

    <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="mx-auto w-full max-w-[320px] sm:max-w-[500px]">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-semibold text-gray-700 uppercase tracking-tight mb-1">Email</label>
            <input id="email" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}"
                   required 
                   autofocus
                   placeholder="Enter your email"
                   class="block w-full border-gray-300 rounded-lg shadow-sm px-4 py-3 text-sm focus:border-[#00AEEF] focus:ring-[#00AEEF] transition-all">
            
            @error('email')
                <p class="mt-1 text-[11px] text-red-600 font-medium italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-8">
            <button type="submit"
                class="w-full bg-[#00AEEF] hover:bg-[#0095cc] text-white font-bold py-4 rounded-lg shadow-lg transition-all active:scale-[0.97] uppercase tracking-widest text-[11px] sm:text-xs">
                Send Verification Code
            </button>
        </div>
    </form>

</x-guest-layout>