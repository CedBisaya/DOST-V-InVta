<x-guest-layout>
    {{-- 
        Dito sa part na ito, gagamit tayo ng Tailwind screen utility 
        para gawing scrollable ang page na ito lang. 
    --}}
    <style>
        body { overflow-y: auto !important; height: auto !important; }
    </style>

    <div class="text-center mb-6">
        <img src="{{ asset('images/dost-logo.png') }}"
            alt="DOST Logo"
            class="mx-auto w-[184px] h-[100px]">

        <p class="font-poppins font-bold text-[20px] mt-1 text-[#00AEEF]">
            Create Account
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="mx-auto w-full max-w-[400px]">
        @csrf

        <div class="mb-4">
            <x-input-label for="name" value="Full Name" />
            <x-text-input id="name"
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="email" value="Email Address" />
            <x-text-input id="email"
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2"
                type="email"
                name="email"
                :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="password" value="Password" />
            <x-text-input id="password"
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2"
                type="password"
                name="password"
                required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="password_confirmation" value="Confirm Password" />
            <x-text-input id="password_confirmation"
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2"
                type="password"
                name="password_confirmation"
                required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6">
            <button type="submit"
                class="w-full bg-[#00AEEF] hover:bg-[#0095cc] text-white font-semibold py-3 rounded-md shadow-md transition-colors duration-200 uppercase">
                Register
            </button>
        </div>

        <div class="mt-4 text-center pb-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                Already have an account? Log in
            </a>
        </div>
    </form>
</x-guest-layout>