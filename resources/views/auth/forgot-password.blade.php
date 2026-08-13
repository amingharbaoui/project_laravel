<x-guest-layout>
    <div class="mb-6">
        <h2 class="font-display font-700 text-2xl text-ink">Forgot your password?</h2>
        <p class="text-sm text-muted mt-1">
            No problem. Enter your email and we'll send you a password reset link.
        </p>
    </div>

    <x-auth-session-status class="mb-4 text-olive" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-muted mb-1">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex justify-end pt-2">
            <button type="submit" class="bg-olive text-[#101006] font-medium px-6 py-2.5 rounded-full hover:brightness-110 transition">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</x-guest-layout>
