<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $user->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">

                @if($user->profile_photo_path)
                    <img src="{{ Storage::url($user->profile_photo_path) }}" class="w-24 h-24 object-cover rounded-full mb-4">
                @endif

                <h3 class="text-xl font-semibold">{{ $user->name }}</h3>

                @if($user->birthday)
                    <p class="text-sm text-gray-500">Verjaardag: {{ $user->birthday->format('d/m/Y') }}</p>
                @endif

                @if($user->bio)
                    <p class="mt-4">{{ $user->bio }}</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
