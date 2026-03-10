<x-guest-layout>
    <!--Header-->
    <div class="absolute top-4 left-4 sm:top-6 sm:left-6 md:top-8 md:left-8 z-[100] flex flex-row items-center gap-2">
        <img src="{{ asset('asset/DOST_LOGO.png') }}" 
            alt="Logo" 
            class="w-[60px] h-[60px] md:w-[80px] md:h-[80px] object-contain">
        
        <div class="flex flex-col justify-center leading-none">
            <p class="font-poppins font-black text-[26px] md:text-[26px] text-slate-900 uppercase tracking-tight">
                DOST
            </p>
            
            <p class="font-poppins font-semibold text-[16px] md:text-[16px] text-slate-800 uppercase">
                BICOL
            </p>
            
            <p class="font-poppins font-black text-[12px] md:text-[20px] text-slate-700 hidden sm:block border-slate-900">
                OneDOST4U: Solutions and Opportunities
            </p>
        </div>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mx-auto w-full max-w-[400px]">
    

    <div class="px-8">
        
        <div class="text-center mb-6 pt-8">
            <img src="{{ asset('asset/InVta_Logo.png') }}"
                alt="InVta Logo"
                class="mx-auto w-[190px] h-auto">
            <h2 class="font-poppins font-bold text-[22px] mt-4" style="color:#00AEEF;">
                Login Account
            </h2>
        </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!--Account ID-->
                <div class="mb-4">
                    {{-- Increased text contrast for label as it's now on page background --}}
                    <x-input-label for="email" value="Account ID" class="font-semibold text-gray-800" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-[#00AEEF] focus:ring-[#00AEEF]"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!--Password-->
                <div class="mb-4" x-data="{ show: false }">
                    <x-input-label for="password" value="Password" class="font-semibold text-gray-800" />
                    
                    <div class="relative mt-1">
                        <x-text-input id="password"
                            class="block w-full border-gray-300 rounded-md shadow-sm pr-10 focus:border-[#00AEEF] focus:ring-[#00AEEF]"
                            ::type="show ? 'text' : 'password'"
                            name="password"
                            required
                            autocomplete="current-password" />

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
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!--Remember me & Forgot Password-->
                <div class="mb-6 flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#00AEEF] shadow-sm focus:ring-[#00AEEF]" name="remember">
                        {{-- Increased contrast --}}
                        <span class="ml-2 text-sm text-gray-700">Remember me</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-[#00AEEF] hover:underline">
                        Forgot password?
                    </a>
                </div>
                
                <!--Sign In-->
                <button type="submit" class="w-full bg-[#00AEEF] hover:bg-[#0095cc] text-white font-bold py-3 rounded-md transition duration-200 uppercase tracking-wide shadow-md">
                    SIGN IN
                </button>
            </form>
        </div>
    </div>

</form>

</x-guest-layout>
