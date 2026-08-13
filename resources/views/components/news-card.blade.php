@props(['news'])

<div class="border rounded-lg p-4 shadow-sm">
    @if($news->image)
        <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full h-40 object-cover rounded mb-3">
    @endif
    <h3 class="text-lg font-semibold">{{ $news->title }}</h3>
    <p class="text-sm text-gray-500">{{ $news->published_at->format('d/m/Y') }} — {{ $news->user->name }}</p>
    <p class="mt-2">{{ Str::limit($news->content, 100) }}</p>
    <a href="{{ route('news.show', $news) }}" class="text-blue-600 hover:underline">Lees meer</a>
</div>
