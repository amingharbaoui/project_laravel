<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $news->title }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if($news->image)
                <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full h-64 object-cover rounded mb-4">
            @endif

            <p class="text-sm text-gray-500 mb-2">
                {{ $news->published_at->format('d/m/Y') }} —
                <a href="{{ route('profile.show', $news->user) }}" class="text-blue-600 hover:underline">{{ $news->user->name }}</a>
            </p>

            <div class="prose max-w-none mb-4">
                {{ $news->content }}
            </div>

            @if($news->tags->count())
                <div class="flex gap-2 mb-4">
                    @foreach($news->tags as $tag)
                        <span class="text-xs bg-gray-200 px-2 py-1 rounded">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif

            @if(auth()->check() && auth()->user()->isAdmin())
                <div class="flex gap-2">
                    <a href="{{ route('news.edit', $news) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Bewerken</a>
                    <form action="{{ route('news.destroy', $news) }}" method="POST" onsubmit="return confirm('Weet je het zeker?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Verwijderen</button>
                    </form>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
