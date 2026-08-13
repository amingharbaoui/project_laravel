<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">FAQ</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            @foreach($categories as $category)
                <x-faq-category :category="$category" />
            @endforeach

            @if(auth()->check() && auth()->user()->isAdmin())
                <div class="border rounded-lg p-4 mt-6">
                    <h3 class="font-semibold mb-2">Nieuwe categorie</h3>
                    <form action="{{ route('faq-categories.store') }}" method="POST" class="flex gap-2">
                        @csrf
                        <input type="text" name="name" placeholder="Categorienaam" required class="flex-1 border rounded p-2">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Toevoegen</button>
                    </form>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
