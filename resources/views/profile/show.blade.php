<x-app-layout>
    <x-slot name="header">
        <x-page-header eyebrow="Profile" :title="$user->name" accent="olive" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal bg-surface border border-white/10 rounded-3xl p-6">

                @if($user->profile_photo_path)
                    <img src="{{ Storage::url($user->profile_photo_path) }}" class="w-24 h-24 object-cover rounded-full mb-4 border border-white/10" loading="lazy">
                @else
                    <div class="w-24 h-24 rounded-full bg-olive/20 flex items-center justify-center mb-4 text-2xl font-display font-700 text-olive">
                        {{ Str::substr($user->name, 0, 1) }}
                    </div>
                @endif

                <h3 class="font-display font-700 text-2xl text-ink">{{ $user->name }}</h3>

                @if($user->birthday)
                    <p class="text-sm text-muted mt-1">Birthday: {{ $user->birthday->format('d/m/Y') }}</p>
                @endif

                @if($user->bio)
                    <p class="mt-4 text-ink leading-relaxed">{{ $user->bio }}</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
