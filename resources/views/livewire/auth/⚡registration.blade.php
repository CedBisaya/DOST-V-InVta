    <?php

    use App\Models\User;
    use Illuminate\Auth\Events\Registered;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Validation\Rules;
    use Livewire\Volt\Component;

    new class extends Component
    {
        public string $name = '';
        public string $email = '';
        public string $password = '';
        public string $password_confirmation = '';

        public function register(): void
        {
            $validated = $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            ]);

            $validated['password'] = Hash::make($validated['password']);

            event(new Registered($user = User::create($validated)));

            Auth::login($user);

            $this->redirect(route('dashboard', absolute: false), navigate: true);
        }
    }; ?>

    <div class="w-full max-w-[400px] mx-auto">
        <form wire:submit="register">
            <div class="mb-4">
                <x-input-label for="name" value="Full Name" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2" type="text" name="name" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="email" value="Email Address" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2" type="email" name="email" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="password" value="Password" />
                <x-text-input wire:model="password" id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="password_confirmation" value="Confirm Password" />
                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2" type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-[#00AEEF] hover:bg-[#0095cc] text-white font-semibold py-3 rounded-md shadow-md transition-colors duration-200 uppercase">
                    <span wire:loading.remove>Register</span>
                    <span wire:loading>Processing...</span>
                </button>
            </div>
        </form>
    </div>