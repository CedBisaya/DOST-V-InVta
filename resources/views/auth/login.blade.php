<x-guest-layout>

    <!-- Logo -->
    <div class="text-center mb-6">
        <img src="{{ asset('images/dost-logo.png') }}"
             alt="DOST Logo"
             class="mx-auto w-[184.29px] h-[100.42px]">

        <p class="font-poppins font-bold text-[20px] mt-1" style="color:#00AEEF;">
            Login Account
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mx-auto w-full max-w-[400px]">

    @csrf

    <!-- Account ID -->
    <div class="mb-4">
        <x-input-label for="email" value="Account ID" />
        <x-text-input id="email"
            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
            type="email"
            name="email"
            :value="old('email')"
            required
            autofocus
            autocomplete="username" />

        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mb-4">
        <x-input-label for="password" value="Password" />
        <x-text-input id="password"
            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
            type="password"
            name="password"
            required
            autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="mb-4 flex items-center">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me"
                   type="checkbox"
                   class="rounded border-gray-300 text-blue-500 shadow-sm focus:ring-blue-500"
                   name="remember">

            <span class="ml-2 text-sm text-gray-600">Remember me</span>
        </label>

        <a href="{{ route('password.request') }}"
           class="ml-auto text-sm text-blue-500" style="color:#00AEEF;">
            Forgot password?
        </a>
    </div>

    <!-- Sign In -->
    <div class="mb-4">
        <button type="submit"
            class="w-full bg-[#00AEEF] hover:bg-[#0095cc] text-white font-semibold py-2 rounded-md">
            SIGN IN
        </button>
    </div>

</form>

</x-guest-layout>
