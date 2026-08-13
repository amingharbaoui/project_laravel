<x-app-layout>
    <x-slot name="header">
        <x-page-header
            eyebrow="Club news"
            title="News"
            subtitle="The latest from the club"
            accent="olive"
        />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('news.create') }}" class="inline-block mb-6 bg-terracotta text-white font-medium px-5 py-2.5 rounded-full hover:brightness-110 transition">
                    + New post
                </a>
            @endif

            @if(session('success'))
                <div class="mb-4 p-3 bg-olive/20 text-olive rounded-2xl">{{ session('success') }}</div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($news as $item)
                    <div class="reveal">
                        <x-news-card :news="$item" />
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $news->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
