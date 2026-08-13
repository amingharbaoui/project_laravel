<x-app-layout>
    <x-slot name="header">
        <x-page-header eyebrow="Admin" title="New user" accent="terracotta" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('admin.users.store') }}" method="POST" class="reveal bg-surface border border-subtle rounded-3xl p-6 space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-muted mb-1">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-terracotta focus:ring-0">
                    @error('name') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-muted mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-terracotta focus:ring-0">
                    @error('email') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-muted mb-1">Password</label>
                    <input type="password" name="password" required class="w-full rounded-xl px-4 py-2.5 text-sm text-ink bg-field border border-subtle focus:border-terracotta focus:ring-0">
                    @error('password') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-muted mb-2">Role</label>
                    <div class="flex flex-wrap gap-2">
                        <label class="relative cursor-pointer">
                            <input type="radio" name="role" value="user" checked class="peer sr-only">
                            <span class="block text-sm text-ink bg-field border border-subtle px-4 py-2 rounded-full transition peer-checked:bg-terracotta peer-checked:text-white peer-checked:border-terracotta">
                                User
                            </span>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="role" value="admin" class="peer sr-only">
                            <span class="block text-sm text-ink bg-field border border-subtle px-4 py-2 rounded-full transition peer-checked:bg-terracotta peer-checked:text-white peer-checked:border-terracotta">
                                Admin
                            </span>
                        </label>
                    </div>
                    @error('role') <p class="text-terracotta text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="bg-terracotta text-white font-medium px-6 py-2.5 rounded-full hover:brightness-110 transition">Create user</button>
            </form>
        </div>
    </div>
</x-app-layout>
