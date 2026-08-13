<section>
    <header>
        <h2 class="font-display font-700 text-lg text-ink">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-muted mb-1">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-violet focus:ring-0">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-muted mb-1">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-violet focus:ring-0">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-muted mb-1">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-violet focus:ring-0">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-violet text-[#0B0B0D] font-medium px-6 py-2.5 rounded-full hover:brightness-110 transition">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-violet"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
