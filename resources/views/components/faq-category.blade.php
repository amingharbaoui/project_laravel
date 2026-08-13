@props(['category'])

<div class="bg-surface border border-subtle rounded-3xl p-6 mb-5">
    <div class="flex items-center gap-3 mb-5">
        <span class="w-2 h-2 rounded-full bg-violet"></span>
        <h3 class="font-display font-700 text-xl text-ink">{{ $category->name }}</h3>
    </div>

    <div class="space-y-3">
        @foreach($category->items as $item)
            <div class="bg-field border border-subtle rounded-2xl p-4" x-data="">
                <p class="font-semibold text-ink">{{ $item->question }}</p>
                <p class="text-sm mt-1 text-muted">{{ $item->answer }}</p>

                @if(auth()->check() && auth()->user()->isAdmin())
                    <div class="flex gap-2 mt-3">
                        <button type="button" onclick="document.getElementById('edit-item-{{ $item->id }}').classList.toggle('hidden')" class="text-xs font-medium text-violet bg-violet/10 hover:bg-violet/20 px-3 py-1 rounded-full transition">Edit</button>

                        <button type="button" x-on:click="$dispatch('open-modal', 'confirm-faq-delete-{{ $item->id }}')" class="text-xs font-medium text-terracotta bg-terracotta/10 hover:bg-terracotta/20 px-3 py-1 rounded-full transition">Delete</button>
                    </div>

                    <form id="edit-item-{{ $item->id }}" action="{{ route('faq-items.update', $item) }}" method="POST" class="hidden mt-3 space-y-2">
                        @csrf
                        @method('PUT')
                        <input type="text" name="question" value="{{ $item->question }}" class="w-full rounded-lg p-2 text-sm text-ink bg-surface border border-subtle focus:border-violet focus:ring-0">
                        <textarea name="answer" class="w-full rounded-lg p-2 text-sm text-ink bg-surface border border-subtle focus:border-violet focus:ring-0">{{ $item->answer }}</textarea>
                        <button type="submit" class="text-xs font-medium bg-violet text-[#0B0B0D] px-3 py-1.5 rounded-full hover:brightness-110 transition">Save</button>
                    </form>

                    <x-modal name="confirm-faq-delete-{{ $item->id }}" focusable>
                        <div class="p-6">
                            <h2 class="font-display font-700 text-lg text-ink">
                                Are you sure?
                            </h2>

                            <p class="mt-2 text-sm text-muted">
                                The question "{{ $item->question }}" will be permanently deleted. This action cannot be undone.
                            </p>

                            <div class="mt-6 flex justify-end gap-3">
                                <button type="button" x-on:click="$dispatch('close')" class="text-sm text-muted hover:text-ink px-5 py-2.5 transition">
                                    Cancel
                                </button>

                                <form action="{{ route('faq-items.destroy', $item) }}" method="POST">
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
        @endforeach
    </div>

    @if(auth()->check() && auth()->user()->isAdmin())
        <form action="{{ route('faq-items.store') }}" method="POST" class="mt-5 space-y-2 border-t border-subtle pt-5">
            @csrf
            <input type="hidden" name="faq_category_id" value="{{ $category->id }}">
            <input type="text" name="question" placeholder="New question" required class="w-full rounded-lg p-2.5 text-sm text-ink bg-field border border-subtle placeholder:text-muted focus:border-violet focus:ring-0">
            <textarea name="answer" placeholder="Answer" required class="w-full rounded-lg p-2.5 text-sm text-ink bg-field border border-subtle placeholder:text-muted focus:border-violet focus:ring-0"></textarea>
            <button type="submit" class="text-xs font-medium bg-violet text-[#0B0B0D] px-4 py-2 rounded-full hover:brightness-110 transition">Add question</button>
        </form>
    @endif
</div>
