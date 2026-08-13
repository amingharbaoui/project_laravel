<x-app-layout>
    <x-slot name="header">
        <x-page-header eyebrow="Admin" title="New post" accent="terracotta" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="reveal bg-surface border border-subtle rounded-3xl p-6 space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-muted mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">
                    @error('title') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-muted mb-1">Image</label>
                    <input type="file" name="image" accept="image/*" class="block text-sm text-muted
                        file:mr-4 file:py-2 file:px-5 file:rounded-full file:border-0
                        file:text-sm file:font-medium file:bg-olive file:text-[#101006]
                        hover:file:brightness-110 file:cursor-pointer file:transition">
                    @error('image') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-muted mb-1">Content</label>
                    <textarea name="content" rows="6" required class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0">{{ old('content') }}</textarea>
                    @error('content') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-muted mb-1">Publish date</label>
                    <input type="date" name="published_at" value="{{ old('published_at') }}" required class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-olive focus:ring-0 [color-scheme:dark] html.light:[color-scheme:light]">
                    @error('published_at') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-muted mb-2">Tags</label>
                    <div id="tags-container" class="flex flex-wrap gap-2 mb-3">
                        @foreach($tags as $tag)
                            <label class="relative cursor-pointer">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="peer sr-only">
                                <span class="block text-sm text-ink bg-field border border-subtle px-4 py-2 rounded-full transition peer-checked:bg-olive peer-checked:text-[#101006] peer-checked:border-olive">
                                    {{ $tag->name }}
                                </span>
                            </label>
                        @endforeach
                    </div>

                    <div class="flex gap-2">
                        <input type="text" id="new-tag-input" placeholder="New tag..." class="flex-1 rounded-full px-4 py-2 text-sm text-ink bg-field border border-subtle placeholder:text-muted focus:border-olive focus:ring-0">
                        <button type="button" id="add-tag-btn" class="bg-subtle text-ink text-sm font-medium px-4 py-2 rounded-full hover:brightness-95 transition">+ Add</button>
                    </div>
                    <p id="tag-error" class="text-terracotta text-sm mt-1 hidden"></p>
                </div>

                <button type="submit" class="bg-olive text-[#101006] font-medium px-6 py-2.5 rounded-full hover:brightness-110 transition">Save</button>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('add-tag-btn').addEventListener('click', async () => {
            const input = document.getElementById('new-tag-input');
            const errorEl = document.getElementById('tag-error');
            const name = input.value.trim();
            errorEl.classList.add('hidden');

            if (!name) return;

            try {
                const response = await axios.post('{{ route('tags.store') }}', { name });
                const tag = response.data;

                const container = document.getElementById('tags-container');
                const label = document.createElement('label');
                label.className = 'relative cursor-pointer';
                label.innerHTML = `
                    <input type="checkbox" name="tags[]" value="${tag.id}" class="peer sr-only" checked>
                    <span class="block text-sm text-ink bg-field border border-subtle px-4 py-2 rounded-full transition peer-checked:bg-olive peer-checked:text-[#101006] peer-checked:border-olive">
                        ${tag.name}
                    </span>
                `;
                container.appendChild(label);
                input.value = '';
            } catch (err) {
                errorEl.textContent = err.response?.data?.errors?.name?.[0] || 'Could not add tag.';
                errorEl.classList.remove('hidden');
            }
        });
    </script>
    @endpush
</x-app-layout>
