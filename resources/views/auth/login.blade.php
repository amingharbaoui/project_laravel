<x-guest-layout>
    <div class="mb-6">
        <h2 class="font-display font-700 text-2xl text-ink">Welcome back</h2>
        <p class="text-sm text-muted mt-1">Log in to your account</p>
    </div>

    <x-auth-session-status class="mb-4 text-olive" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-muted mb-1">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div x-data="{ show: false }">
            <label for="password" class="block text-sm font-medium text-muted mb-1">{{ __('Password') }}</label>
            <div class="relative">
                <input :type="show ? 'text' : 'password'" id="password" name="password" required autocomplete="current-password" class="w-full rounded-xl px-4 py-2.5 pr-11 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">
                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-muted hover:text-ink transition">
                    <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.243L9.88 9.88" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
                <input id="remember_me" type="checkbox" name="remember" class="rounded border-subtle bg-field text-olive focus:ring-olive focus:ring-offset-0">
                <span class="text-sm text-muted">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between pt-2">
            @if (Route::has('password.request'))
                <a class="text-sm text-muted hover:text-ink underline transition" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="bg-olive text-[#101006] font-medium px-6 py-2.5 rounded-full hover:brightness-110 transition">
                {{ __('Log in') }}
            </button>
        </div>
    </form>

    <p class="mt-6 text-sm text-muted text-center">
        Don't have an account?
        <a href="{{ route('register') }}" class="text-olive hover:underline">Register</a>
    </p>
</x-guest-layout>
