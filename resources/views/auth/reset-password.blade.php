<x-guest-layout>
    <div class="mb-6">
        <h2 class="font-display font-700 text-2xl text-ink">Reset your password</h2>
        <p class="text-sm text-muted mt-1">Choose a new password below</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label for="email" class="block text-sm font-medium text-muted mb-1">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-muted mb-1">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-muted mb-1">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-end pt-2">
            <button type="submit" class="bg-olive text-[#101006] font-medium px-6 py-2.5 rounded-full hover:brightness-110 transition">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</x-guest-layout>
