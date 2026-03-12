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
                    placeholder="Enter your password"
                    class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2.5 text-sm pr-10 focus:border-[#00AEEF] focus:ring-[#00AEEF] transition-all">
                
                <button type="button" @click="show = !show" 
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-[#00AEEF] focus:outline-none">
                    
                    <span x-show="!show">
                        <x-heroicon-o-eye class="h-5 w-5" />
                    </span>
                    
                    <span x-show="show" x-cloak>
                        <x-heroicon-o-eye-slash class="h-5 w-5" />
                    </span>
                </button>
            </div>

            @error('password')
                <p class="mt-1 text-[11px] text-red-600 font-medium italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 flex flex-row items-center justify-between w-full gap-2">
            <label for="remember_me" class="inline-flex items-center cursor-pointer flex-shrink-0">
                <input id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="w-4 h-4 rounded border-gray-300 text-[#00AEEF] shadow-sm focus:ring-[#00AEEF]">
                <span class="ml-1.5 text-[11px] xs:text-xs sm:text-sm text-gray-600 whitespace-nowrap">
                    Remember me
                </span>
            </label>

        <a href="{{ route('password.request') }}" 
        class="text-[11px] xs:text-xs sm:text-sm text-[#00AEEF] font-bold hover:underline transition-all whitespace-nowrap flex-shrink-0">
            Forgot password?
        </a>
    </div>

        <div class="mb-4">
            <button type="submit"
                    class="w-full bg-[#00AEEF] hover:bg-[#0095cc] text-white font-bold py-3 rounded-lg transition-all active:scale-[0.97] shadow-lg uppercase tracking-widest text-xs sm:text-sm">
                SIGN IN
            </button>
        </div>
        <div class="mt-4 text-center">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                Don't have an account? Sign Up
            </a>
        </div>
    </form>

</x-guest-layout>