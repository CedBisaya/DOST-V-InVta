<x-guest-layout>

    <!-- Logo + Title -->
    <div class="text-center mb-6">
        <img src="{{ asset('images/dost-logo.png') }}"
             alt="DOST Logo"
             class="mx-auto w-[184px] h-[100px]">

        <p class="font-poppins font-bold text-[20px] mt-1 text-[#00AEEF]">
            Account Verification
        </p>
    </div>
    
    <div class="mx-auto w-full max-w-[400px] mb-4 text-sm text-gray-600 text-center sm:text-left">
        Please enter your Account ID to reset your password. We’ll send a 2FA verification code to your registered personal email.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Compressed Form -->
    <form method="POST" action="{{ route('password.email') }}" class="mx-auto w-full max-w-[400px]">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" value="Email" />
            <x-text-input id="email"
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit"
                class="w-full bg-[#00AEEF] hover:bg-[#0095cc] text-white font-semibold py-3 rounded-md shadow-md transition-colors duration-200">
                SEND VERIFICATION CODE
            </button>
        </div>
    </form>

</x-guest-layout>
