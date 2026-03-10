<x-guest-layout>

    <div class="text-center mb-6">
        <img src="{{ asset('images/dost-logo.png') }}" 
             alt="DOST Logo" 
             class="mx-auto w-32 sm:w-40 h-auto mb-4">

        <p class="font-poppins font-bold text-xl uppercase tracking-wider text-[#00AEEF]">
            Login Account
        </p>
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 text-center bg-green-50 p-2 rounded-md">
            {{ session('status') }} 
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="mx-auto w-full max-w-[320px] sm:max-w-[400px]">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-semibold text-gray-700 uppercase tracking-tight">Account ID</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   required autofocus
                   autocomplete="username"
                   placeholder="Enter your email"
                   class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm px-3 py-2.5 text-sm focus:border-[#00AEEF] focus:ring-[#00AEEF] transition-all">

            @error('email')
                <p class="mt-1 text-[11px] text-red-600 font-medium italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4" x-data="{ show: false }">
            <label for="password" class="block text-sm font-semibold text-gray-700 uppercase tracking-tight">Password</label>
            <div class="relative mt-1">
                <input id="password" 
                       :type="show ? 'text' : 'password'" 
                       name="password"
                       required
                       autocomplete="current-password"
                       placeholder="••••••••"
                       class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2.5 text-sm pr-10 focus:border-[#00AEEF] focus:ring-[#00AEEF] transition-all">
                
                <button type="button" 
                        @click="show = !show" 
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-[#00AEEF] transition-colors">
                    
                    <svg x-show="show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>

                    <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                    </svg>
                </button>
            </div>

            @error('password')
                <p class="mt-1 text-[11px] text-red-600 font-medium italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me"
                       type="checkbox"
                       name="remember"
                       class="rounded border-gray-300 text-[#00AEEF] shadow-sm focus:ring-[#00AEEF]">
                <span class="ml-2 text-xs sm:text-sm text-gray-600">Remember me</span>
            </label>

            <a href="{{ route('password.request') }}" class="text-xs sm:text-sm text-[#00AEEF] font-bold hover:underline transition-all">
                Forgot password?
            </a>
        </div>

        <div class="mb-4">
            <button type="submit"
                    class="w-full bg-[#00AEEF] hover:bg-[#0095cc] text-white font-bold py-3 rounded-lg transition-all active:scale-[0.97] shadow-lg uppercase tracking-widest text-xs sm:text-sm">
                SIGN IN
            </button>
        </div>
    </form>

</x-guest-layout>