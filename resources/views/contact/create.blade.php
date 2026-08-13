<x-app-layout>
    <x-slot name="header">
        <x-page-header
            eyebrow="Get in touch"
            title="Contact"
            subtitle="Ask us a question"
            accent="terracotta"
        />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-3 bg-violet/20 text-violet rounded-2xl">{{ session('success') }}</div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="reveal bg-surface border border-subtle rounded-3xl p-6 sm:p-8 space-y-5">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-muted mb-1">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle placeholder:text-muted">
                        @error('name') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-muted mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle placeholder:text-muted">
                        @error('email') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-muted mb-1">Message</label>
                    <textarea name="message" rows="8" required class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle placeholder:text-muted">{{ old('message') }}</textarea>
                    @error('message') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="bg-terracotta text-white font-medium px-6 py-2.5 rounded-full hover:brightness-110 transition">Send</button>
            </form>

        </div>
    </div>
</x-app-layout>
