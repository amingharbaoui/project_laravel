<x-app-layout>
    <x-slot name="header">
        <x-page-header
            eyebrow="Need help?"
            title="FAQ"
            subtitle="Frequently asked questions"
            accent="violet"
        />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-3 bg-violet/20 text-violet rounded-2xl">{{ session('success') }}</div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($categories as $category)
                    <div class="reveal">
                        <x-faq-category :category="$category" />
                    </div>
                @endforeach
            </div>

            @if(auth()->check() && auth()->user()->isAdmin())
                <div class="bg-surface border border-subtle rounded-3xl p-6 mt-6">
                    <h3 class="font-display font-700 text-ink mb-3">New category</h3>
                    <form action="{{ route('faq-categories.store') }}" method="POST" class="flex gap-2">
                        @csrf
                        <input type="text" name="name" placeholder="Category name" required class="flex-1 rounded-full px-4 py-2 text-sm text-ink bg-field border border-subtle placeholder:text-muted">
                        <button type="submit" class="bg-terracotta text-white font-medium px-5 py-2 rounded-full hover:brightness-110 transition">Add</button>
                    </form>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
