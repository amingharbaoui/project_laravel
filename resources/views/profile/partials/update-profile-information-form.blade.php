<section>
    <header>
        <h2 class="font-display font-700 text-lg text-ink">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-muted">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-5">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-sm font-medium text-muted mb-1">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-muted mb-1">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-muted">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-olive hover:brightness-110">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-olive">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <label for="birthday" class="block text-sm font-medium text-muted mb-1">{{ __('Birthday') }}</label>
            <input id="birthday" name="birthday" type="date" value="{{ old('birthday', $user->birthday?->format('Y-m-d')) }}" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">
            <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
        </div>

        <div>
            <label for="bio" class="block text-sm font-medium text-muted mb-1">{{ __('Bio') }}</label>
            <textarea id="bio" name="bio" rows="4" class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">{{ old('bio', $user->bio) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div>
            <label class="block text-sm font-medium text-muted mb-1">{{ __('Profile photo') }}</label>
            @if($user->profile_photo_path)
                <img src="{{ Storage::url($user->profile_photo_path) }}" class="w-20 h-20 object-cover rounded-full mt-1 mb-2" loading="lazy">
            @endif
            <input id="profile_photo" name="profile_photo" type="file" accept="image/*" class="block text-sm text-muted
                file:mr-4 file:py-2 file:px-5 file:rounded-full file:border-0
                file:text-sm file:font-medium file:bg-olive file:text-[#101006]
                hover:file:brightness-110 file:cursor-pointer file:transition">
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-olive text-[#101006] font-medium px-6 py-2.5 rounded-full hover:brightness-110 transition">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-olive"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
