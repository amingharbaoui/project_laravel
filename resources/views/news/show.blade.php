<x-app-layout>
    <x-slot name="header">
        <x-page-header eyebrow="News post" :title="$news->title" accent="olive" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="reveal bg-surface border border-subtle rounded-3xl overflow-hidden">

                @if($news->image)
                    <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full h-64 object-cover" loading="lazy">
                @endif

                <div class="p-6">
                    <p class="text-sm text-muted mb-4">
                        {{ $news->published_at->format('d/m/Y') }} —
                        <a href="{{ route('profile.show', $news->user) }}" class="text-olive hover:underline">{{ $news->user->name }}</a>
                    </p>

                    <div class="text-ink leading-relaxed mb-4">
                        {{ $news->content }}
                    </div>

                    @if($news->tags->count())
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach($news->tags as $tag)
                                <span class="text-xs font-medium bg-olive/20 text-olive px-3 py-1 rounded-full">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    @endif

                    @if(auth()->check() && auth()->user()->isAdmin())
                        <div class="flex gap-3 pt-4 border-t border-subtle" x-data="">
                            <a href="{{ route('news.edit', $news) }}" class="bg-violet text-[#0B0B0D] font-medium px-5 py-2 rounded-full hover:brightness-110 transition">Edit</a>

                            <button type="button" x-on:click="$dispatch('open-modal', 'confirm-news-deletion')" class="bg-terracotta text-white font-medium px-5 py-2 rounded-full hover:brightness-110 transition">
                                Delete
                            </button>
                        </div>

                        <x-modal name="confirm-news-deletion" focusable>
                            <div class="p-6">
                                <h2 class="font-display font-700 text-lg text-ink">
                                    Are you sure?
                                </h2>

                                <p class="mt-2 text-sm text-muted">
                                    The post "{{ $news->title }}" will be permanently deleted. This action cannot be undone.
                                </p>

                                <div class="mt-6 flex justify-end gap-3">
                                    <button type="button" x-on:click="$dispatch('close')" class="text-sm text-muted hover:text-ink px-5 py-2.5 transition">
                                        Cancel
                                    </button>

                                    <form action="{{ route('news.destroy', $news) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-terracotta text-white font-medium px-6 py-2.5 rounded-full hover:brightness-110 transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </x-modal>
                    @endif
                </div>
            </div>

            <div class="reveal bg-surface border border-subtle rounded-3xl p-6">
                <h3 class="font-display font-700 text-lg text-ink mb-4">
                    Comments ({{ $news->comments->count() }})
                </h3>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-olive/20 text-olive rounded-2xl text-sm">{{ session('success') }}</div>
                @endif

                @auth
                    <form action="{{ route('comments.store', $news) }}" method="POST" class="mb-6 space-y-2">
                        @csrf
                        <textarea name="body" rows="3" required placeholder="Write a comment..." class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle placeholder:text-muted focus:border-olive focus:ring-0"></textarea>
                        @error('body') <p class="text-terracotta text-sm">{{ $message }}</p> @enderror
                        <button type="submit" class="bg-olive text-[#101006] font-medium text-sm px-5 py-2 rounded-full hover:brightness-110 transition">Post comment</button>
                    </form>
                @else
                    <p class="text-sm text-muted mb-6">
                        <a href="{{ route('login') }}" class="text-olive hover:underline">Log in</a> to leave a comment.
                    </p>
                @endauth

                <div class="space-y-4">
                    @forelse($news->comments as $comment)
                        <div class="bg-field border border-subtle rounded-2xl p-4" x-data="">
                            <div class="flex items-center justify-between">
                                <a href="{{ route('profile.show', $comment->user) }}" class="text-sm font-medium text-ink hover:underline">{{ $comment->user->name }}</a>
                                <span class="text-xs text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-sm text-muted mt-2">{{ $comment->body }}</p>

                            @if(auth()->check() && (auth()->id() === $comment->user_id || auth()->user()->isAdmin()))
                                <button type="button" x-on:click="$dispatch('open-modal', 'confirm-comment-delete-{{ $comment->id }}')" class="text-xs text-terracotta mt-2 hover:underline">Delete</button>

                                <x-modal name="confirm-comment-delete-{{ $comment->id }}" focusable>
                                    <div class="p-6">
                                        <h2 class="font-display font-700 text-lg text-ink">Delete this comment?</h2>
                                        <p class="mt-2 text-sm text-muted">This action cannot be undone.</p>
                                        <div class="mt-6 flex justify-end gap-3">
                                            <button type="button" x-on:click="$dispatch('close')" class="text-sm text-muted hover:text-ink px-5 py-2.5 transition">Cancel</button>
                                            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-terracotta text-white font-medium px-6 py-2.5 rounded-full hover:brightness-110 transition">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </x-modal>
                            @endif
                        </div>
                    @empty
                        <p class="text-sm text-muted">No comments yet. Be the first to comment.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
