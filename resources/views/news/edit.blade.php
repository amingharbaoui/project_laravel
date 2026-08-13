<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nieuwtje bewerken</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block font-medium">Titel</label>
                    <input type="text" name="title" value="{{ old('title', $news->title) }}" required class="w-full border rounded p-2">
                    @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-medium">Afbeelding</label>
                    @if($news->image)
                        <img src="{{ Storage::url($news->image) }}" class="w-32 h-20 object-cover rounded mb-2">
                    @endif
                    <input type="file" name="image" accept="image/*" class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block font-medium">Content</label>
                    <textarea name="content" rows="6" required class="w-full border rounded p-2">{{ old('content', $news->content) }}</textarea>
                    @error('content') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-medium">Publicatiedatum</label>
                    <input type="date" name="published_at" value="{{ old('published_at', $news->published_at->format('Y-m-d')) }}" required class="w-full border rounded p-2">
                    @error('published_at') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-medium">Tags</label>
                    @foreach($tags as $tag)
                        <label class="mr-3">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @checked($news->tags->contains($tag->id))> {{ $tag->name }}
                        </label>
                    @endforeach
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Bijwerken</button>
            </form>
        </div>
    </div>
</x-app-layout>
