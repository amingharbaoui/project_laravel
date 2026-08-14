<x-app-layout>
    <x-slot name="header">
        <x-page-header eyebrow="Admin" title="Users" accent="violet" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <a href="{{ route('admin.users.create') }}" class="inline-block mb-6 bg-terracotta text-white font-medium px-5 py-2.5 rounded-full hover:brightness-110 transition">
                + New user
            </a>

            @if(session('success'))
                <div class="mb-4 p-3 bg-olive/20 text-olive rounded-2xl">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-3 bg-terracotta/20 text-terracotta rounded-2xl">{{ session('error') }}</div>
            @endif

            <div class="reveal bg-surface border border-subtle rounded-3xl overflow-hidden" x-data="">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-subtle text-left text-muted">
                            <th class="px-5 py-3 font-medium">Name</th>
                            <th class="px-5 py-3 font-medium">Email</th>
                            <th class="px-5 py-3 font-medium">Role</th>
                            <th class="px-5 py-3 font-medium"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="border-b border-subtle last:border-0">
                                <td class="px-5 py-3 text-ink">
                                    <a href="{{ route('profile.show', $user) }}" class="hover:underline">{{ $user->name }}</a>
                                </td>
                                <td class="px-5 py-3 text-muted">{{ $user->email }}</td>
                                <td class="px-5 py-3">
                                    <span class="text-xs font-medium px-3 py-1 rounded-full {{ $user->role === 'admin' ? 'bg-violet/20 text-violet' : 'bg-subtle text-muted' }}">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td class="px-5 py-3 text-right">
                                    @if($user->id !== auth()->id())
                                        <div class="flex justify-end gap-2">
                                            <form action="{{ route('admin.users.toggle-admin', $user) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-xs font-medium text-olive bg-olive/10 hover:bg-olive/20 px-3 py-1.5 rounded-full transition">
                                                    {{ $user->role === 'admin' ? 'Revoke admin' : 'Make admin' }}
                                                </button>
                                            </form>

                                            <button type="button" x-on:click="$dispatch('open-modal', 'confirm-user-delete-{{ $user->id }}')" class="text-xs font-medium text-terracotta bg-terracotta/10 hover:bg-terracotta/20 px-3 py-1.5 rounded-full transition">
                                                Delete
                                            </button>
                                        </div>
                                    @else
                                        <span class="text-xs text-muted">You</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $users->links() }}
            </div>

        </div>
    </div>

    @foreach($users as $user)
        @if($user->id !== auth()->id())
            <x-modal name="confirm-user-delete-{{ $user->id }}" focusable>
                <div class="p-6">
                    <h2 class="font-display font-700 text-lg text-ink">
                        Delete {{ $user->name }}?
                    </h2>

                    <p class="mt-2 text-sm text-muted">
                        This will permanently delete this user and all of their content (news, comments). This action cannot be undone.
                    </p>

                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" x-on:click="$dispatch('close')" class="text-sm text-muted hover:text-ink px-5 py-2.5 transition">
                            Cancel
                        </button>

                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
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
    @endforeach
</x-app-layout>
