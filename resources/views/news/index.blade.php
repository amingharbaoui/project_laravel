<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nieuws</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('news.create') }}" class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded">
                    Nieuw nieuwtje toevoegen
                </a>
            @endif

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($news as $item)
                    <x-news-card :news="$item" />
                @endforeach
            </div>

            <div class="mt-6">
                {{ $news->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
