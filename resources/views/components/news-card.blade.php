@props(['news'])

<a href="{{ route('news.show', $news) }}" class="group block bg-surface border border-subtle rounded-3xl overflow-hidden hover:border-olive/50 transition">
    @if($news->image)
        <div class="h-40 overflow-hidden">
            <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" loading="lazy">
        </div>
    @else
        <div class="h-40 bg-black/10 flex items-center justify-center">
            <span class="w-2 h-2 rounded-full bg-olive"></span>
        </div>
    @endif

    <div class="p-5">
        <div class="flex items-center gap-2 mb-2">
            <span class="w-1.5 h-1.5 rounded-full bg-olive"></span>
            <p class="text-xs font-medium uppercase tracking-wide text-muted">{{ $news->published_at->format('d M Y') }}</p>
        </div>
        <h3 class="font-display font-700 text-lg leading-snug text-ink">{{ $news->title }}</h3>
        <p class="text-sm mt-2 text-muted">{{ Str::limit($news->content, 90) }}</p>
        <p class="text-xs mt-3 font-medium text-muted">by {{ $news->user->name }}</p>
    </div>
</a>
