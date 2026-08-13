<x-guest-layout>
    <div class="mb-6">
        <h2 class="font-display font-700 text-2xl text-ink">Create an account</h2>
        <p class="text-sm text-muted mt-1">Join the club</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-muted mb-1">{{ __('Name') }}</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-muted mb-1">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">
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

        <div class="flex items-center justify-between pt-2">
            <a class="text-sm text-muted hover:text-ink underline transition" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="bg-olive text-[#101006] font-medium px-6 py-2.5 rounded-full hover:brightness-110 transition">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>
