<x-app-layout>
    <x-slot name="header">
        <x-page-header eyebrow="Admin" title="Edit post" accent="violet" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data" class="reveal bg-surface border border-subtle rounded-3xl p-6 space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-muted mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title', $news->title) }}" required class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-violet focus:ring-0">
                    @error('title') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-muted mb-1">Image</label>
                    @if($news->image)
                        <img src="{{ Storage::url($news->image) }}" class="w-32 h-20 object-cover rounded-xl mb-2" loading="lazy">
                    @endif
                    <input type="file" name="image" accept="image/*" class="block text-sm text-muted
                        file:mr-4 file:py-2 file:px-5 file:rounded-full file:border-0
                        file:text-sm file:font-medium file:bg-violet file:text-[#0B0B0D]
                        hover:file:brightness-110 file:cursor-pointer file:transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-muted mb-1">Content</label>
                    <textarea name="content" rows="6" required class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-violet focus:ring-0">{{ old('content', $news->content) }}</textarea>
                    @error('content') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-muted mb-1">Publish date</label>
                    <input type="date" name="published_at" value="{{ old('published_at', $news->published_at->format('Y-m-d')) }}" required class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-violet focus:ring-0">
                    @error('published_at') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-muted mb-2">Tags</label>
                    <div class="flex flex-wrap gap-2">
                        @foreach($tags as $tag)
                            <label class="relative cursor-pointer">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="peer sr-only" @checked($news->tags->contains($tag->id))>
                                <span class="block text-sm text-ink bg-field border border-subtle px-4 py-2 rounded-full transition peer-checked:bg-violet peer-checked:text-[#0B0B0D] peer-checked:border-violet">
                                    {{ $tag->name }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="bg-violet text-[#0B0B0D] font-medium px-6 py-2.5 rounded-full hover:brightness-110 transition">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
