@props(['category'])

<div class="border rounded-lg p-4 mb-4">
    <h3 class="text-lg font-semibold mb-2">{{ $category->name }}</h3>

    @foreach($category->items as $item)
        <div class="mb-3 pl-2 border-l-2">
            <p class="font-medium">{{ $item->question }}</p>
            <p class="text-gray-600">{{ $item->answer }}</p>

            @if(auth()->check() && auth()->user()->isAdmin())
                <div class="flex gap-2 mt-1">
                    <button type="button" onclick="document.getElementById('edit-item-{{ $item->id }}').classList.toggle('hidden')" class="text-xs text-blue-600">Bewerken</button>
                    <form action="{{ route('faq-items.destroy', $item) }}" method="POST" onsubmit="return confirm('Weet je het zeker?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs text-red-600">Verwijderen</button>
                    </form>
                </div>

                <form id="edit-item-{{ $item->id }}" action="{{ route('faq-items.update', $item) }}" method="POST" class="hidden mt-2 space-y-2">
                    @csrf
                    @method('PUT')
                    <input type="text" name="question" value="{{ $item->question }}" class="w-full border rounded p-1 text-sm">
                    <textarea name="answer" class="w-full border rounded p-1 text-sm">{{ $item->answer }}</textarea>
                    <button type="submit" class="text-xs bg-blue-600 text-white px-2 py-1 rounded">Opslaan</button>
                </form>
            @endif
        </div>
    @endforeach

    @if(auth()->check() && auth()->user()->isAdmin())
        <form action="{{ route('faq-items.store') }}" method="POST" class="mt-3 space-y-2 border-t pt-3">
            @csrf
            <input type="hidden" name="faq_category_id" value="{{ $category->id }}">
            <input type="text" name="question" placeholder="Nieuwe vraag" required class="w-full border rounded p-1 text-sm">
            <textarea name="answer" placeholder="Antwoord" required class="w-full border rounded p-1 text-sm"></textarea>
            <button type="submit" class="text-xs bg-green-600 text-white px-2 py-1 rounded">Vraag toevoegen</button>
        </form>
    @endif
</div>
