<section class="space-y-6">
    <button 
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center px-5 py-2.5 bg-red-600 border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:scale-95 transition-all focus:outline-none"
    >
        {{ __('Delete Account') }}
    </button>

    <div 
        x-data="{ show: false }" 
        x-show="show" 
        x-on:open-modal.window="if ($event.detail === 'confirm-user-deletion') show = true"
        x-on:close-modal.window="show = false"
        x-on:keydown.escape.window="show = false"
        style="display: none;"
        class="fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0 items-center justify-center flex bg-black/50"
    >
        <div class="bg-white rounded-xl overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg p-6 border border-gray-100">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <h2 class="text-lg font-bold text-gray-900">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.') }}
                </p>

                <div class="mt-6">
                    <label for="password" class="sr-only">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" class="mt-1 block w-full border-gray-200 rounded-lg text-sm shadow-sm focus:border-red-500 focus:ring-red-500 transition-all" placeholder="{{ __('Password') }}" />
                    @if($errors->userDeletion->get('password'))
                        <p class="text-red-500 text-xs mt-2 font-medium">{{ $errors->userDeletion->first('password') }}</p>
                    @endif
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" x-on:click="show = false" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-lg font-bold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 transition-all">
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-widest hover:bg-red-700 transition-all">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>