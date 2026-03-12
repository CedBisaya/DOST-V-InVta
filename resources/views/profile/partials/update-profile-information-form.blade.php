<form method="post" action="{{ route('profile.update') }}" class="space-y-6">
    @csrf
    @method('patch')

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="md:col-span-1">
            <label class="block text-xs font-bold text-gray-500 mb-1">First Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">
            @if($errors->has('name'))
                <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="md:col-span-1">
            <label class="block text-xs font-bold text-gray-500 mb-1">Middle Name</label>
            <input type="text" name="middle_name" value="{{ old('middle_name', $user->middle_name ?? '') }}"
                class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">
        </div>

        <div class="md:col-span-1">
            <label class="block text-xs font-bold text-gray-500 mb-1">Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name ?? '') }}"
                class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">
        </div>

        <div class="md:col-span-1">
            <label class="block text-xs font-bold text-gray-500 mb-1">Suffix</label>
            <select name="suffix" 
                    class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all bg-white cursor-pointer">
                <option value="" {{ old('suffix', $user->suffix ?? '') == '' ? 'selected' : '' }}>N/A</option>
                <option value="Jr." {{ old('suffix', $user->suffix ?? '') == 'Jr.' ? 'selected' : '' }}>Jr.</option>
                <option value="Sr." {{ old('suffix', $user->suffix ?? '') == 'Sr.' ? 'selected' : '' }}>Sr.</option>
                <option value="II" {{ old('suffix', $user->suffix ?? '') == 'II' ? 'selected' : '' }}>II</option>
                <option value="III" {{ old('suffix', $user->suffix ?? '') == 'III' ? 'selected' : '' }}>III</option>
                <option value="IV" {{ old('suffix', $user->suffix ?? '') == 'IV' ? 'selected' : '' }}>IV</option>
                <option value="V" {{ old('suffix', $user->suffix ?? '') == 'V' ? 'selected' : '' }}>V</option>
            </select>
        </div>
    </div>

    <div class="max-w-md">
        <label class="block text-xs font-bold text-gray-500 mb-1">Email <span class="text-red-500">*</span></label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
            class="w-full border-gray-200 rounded-lg px-4 py-2 text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">
        @if($errors->has('email'))
            <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $errors->first('email') }}</p>
        @endif
    </div>

    <div class="flex justify-end items-center space-x-4 mt-8 pt-4">
        <button type="submit" class="bg-dost-cyan hover:bg-dost-blue text-white font-bold py-2.5 px-8 rounded-lg text-xs uppercase tracking-widest transition-all shadow-md active:scale-95">
            Save Changes
        </button>
    </div>
</form>

{{-- SUCCESS MODAL --}}
@if(session('status') === 'profile-updated' || session('success'))
<div id="success-modal" class="fixed inset-0 flex items-center justify-center z-[100] transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-[2px]"></div>

    <div class="bg-white rounded-[2.5rem] shadow-2xl p-10 max-w-sm w-full mx-4 relative transform transition-all scale-100 flex flex-col items-center">
        
        <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="w-24 h-24 rounded-full border-[6px] border-green-500 flex items-center justify-center mb-6">
            <svg class="w-14 h-14 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <h3 class="text-[24px] font-black text-green-500 tracking-tight text-center leading-tight">
            Save Changes Successfully!
        </h3>
    </div>
</div>
@endif