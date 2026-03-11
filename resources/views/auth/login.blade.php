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
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.644C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 01-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
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
        <div class="mt-4 text-center">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                Already have an account? Log in
            </a>
        </div>
    </form>

</x-guest-layout>