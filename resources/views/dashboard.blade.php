<x-app-layout>
    <x-slot name="header">
        <x-page-header eyebrow="Welcome back" :title="auth()->user()->name . '.'" subtitle="Here's what's happening at the club today." accent="olive" size="lg" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <a href="{{ route('news.index') }}" class="reveal group lg:col-span-2 bg-surface border border-subtle rounded-3xl p-8 hover:border-olive/50 transition flex flex-col justify-between min-h-[280px]">
                    <div class="w-14 h-14 rounded-2xl bg-olive/20 flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-display font-700 text-2xl text-ink mb-2">Latest news</h3>
                        <p class="text-sm text-muted max-w-sm">Catch up on club announcements, match reports and everything happening around the club.</p>
                    </div>
                    <span class="inline-block mt-6 text-sm font-medium text-olive group-hover:underline">Browse news →</span>
                </a>

                <a href="{{ route('profile.edit') }}" class="reveal group bg-surface border border-subtle rounded-3xl p-6 hover:border-terracotta/50 transition flex flex-col justify-between min-h-[280px]">
                    <div class="w-12 h-12 rounded-2xl bg-terracotta/20 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-terracotta" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-display font-700 text-lg text-ink mb-1">Your profile</h3>
                        <p class="text-sm text-muted">Update your bio, birthday and profile photo.</p>
                    </div>
                    <span class="inline-block mt-4 text-sm font-medium text-terracotta group-hover:underline">Edit profile →</span>
                </a>

                <a href="{{ route('faq.index') }}" class="reveal group bg-surface border border-subtle rounded-3xl p-6 hover:border-violet/50 transition flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-violet/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-violet" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-display font-700 text-base text-ink">Have a question?</h3>
                        <span class="text-sm font-medium text-violet group-hover:underline">View FAQ →</span>
                    </div>
                </a>

                <div class="reveal lg:col-span-2 bg-surface border border-subtle rounded-3xl p-6 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-display font-700 text-base text-ink">Member since</h3>
                        <p class="text-sm text-muted">{{ auth()->user()->created_at->format('F Y') }}</p>
                    </div>
                </div>

            </div>

            @if(auth()->user()->isAdmin())
                <div class="reveal mt-6 bg-surface border border-subtle rounded-3xl p-8 flex items-center justify-between flex-wrap gap-6">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-terracotta font-semibold mb-1">Admin</p>
                        <h3 class="font-display font-700 text-2xl text-ink">Manage the club</h3>
                        <p class="text-sm text-muted mt-1">Create posts, manage the FAQ, and handle user roles.</p>
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        <a href="{{ route('news.create') }}" class="text-sm font-medium bg-olive text-[#101006] px-5 py-2.5 rounded-full hover:brightness-110 transition">+ New post</a>
                        <a href="{{ route('admin.users.index') }}" class="text-sm font-medium bg-terracotta text-white px-5 py-2.5 rounded-full hover:brightness-110 transition">Manage users</a>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
