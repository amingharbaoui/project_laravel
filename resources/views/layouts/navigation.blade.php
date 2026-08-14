<nav x-data="{ open: false }" class="bg-base/95 backdrop-blur border-b border-subtle sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-10">
                <a href="{{ route('dashboard') }}" class="font-display font-700 text-lg tracking-tight text-ink hover:opacity-80 transition">
                    Sportclub<span class="text-olive">.</span>
                </a>

                <div class="hidden sm:flex sm:space-x-1">
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-full text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-subtle text-ink' : 'text-muted hover:text-ink' }}">Dashboard</a>
                    <a href="{{ route('news.index') }}" class="px-3 py-2 rounded-full text-sm font-medium {{ request()->routeIs('news.*') ? 'bg-olive/20 text-olive' : 'text-muted hover:text-ink' }}">News</a>
                    <a href="{{ route('faq.index') }}" class="px-3 py-2 rounded-full text-sm font-medium {{ request()->routeIs('faq.*') ? 'bg-violet/20 text-violet' : 'text-muted hover:text-ink' }}">FAQ</a>
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.users.index') }}" class="px-3 py-2 rounded-full text-sm font-medium {{ request()->routeIs('admin.users.*') ? 'bg-terracotta/20 text-terracotta' : 'text-muted hover:text-ink' }}">Users</a>
                        @endif
                    @endauth
                    <a href="{{ route('contact.create') }}" class="px-3 py-2 rounded-full text-sm font-medium {{ request()->routeIs('contact.*') ? 'bg-terracotta/20 text-terracotta' : 'text-muted hover:text-ink' }}">Contact</a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center gap-3">
                <button id="theme-toggle" type="button" class="theme-switch" aria-label="Toggle theme">
                    <span class="theme-switch-thumb">
                        <svg class="icon-moon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg class="icon-sun" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                </button>

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium text-ink bg-subtle hover:brightness-95 transition">
                                {{ Auth::user()->name }}
                                <svg class="w-4 h-4 opacity-60" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="px-4 py-3 border-b border-subtle mb-1">
                                <p class="text-sm font-medium text-ink truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-muted truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <div class="px-1.5">
                                <x-dropdown-link :href="route('profile.edit')" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>'>
                                    {{ __('Edit Profile') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('profile.show', auth()->user())" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>'>
                                    {{ __('View Public Profile') }}
                                </x-dropdown-link>
                            </div>

                            <div class="my-1 border-t border-subtle"></div>

                            <div class="px-1.5 pb-1.5">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" :danger="true" onclick="event.preventDefault(); this.closest('form').submit();" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>'>
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-full text-sm font-medium text-muted hover:text-ink transition">Log in</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded-full text-sm font-medium bg-olive text-[#101006] hover:brightness-110 transition">Register</a>
                @endauth
            </div>

            <div class="-me-2 flex items-center gap-1 sm:hidden">
                <button id="theme-toggle-mobile" type="button" class="theme-switch" aria-label="Toggle theme">
                    <span class="theme-switch-thumb">
                        <svg class="icon-moon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg class="icon-sun" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                </button>

                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-muted hover:text-ink hover:bg-subtle transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-subtle">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('news.index')" :active="request()->routeIs('news.*')">News</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('faq.index')" :active="request()->routeIs('faq.*')">FAQ</x-responsive-nav-link>
            @auth
                @if(auth()->user()->isAdmin())
                    <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">Users</x-responsive-nav-link>
                @endif
            @endauth
            <x-responsive-nav-link :href="route('contact.create')" :active="request()->routeIs('contact.*')">Contact</x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-3 border-t border-subtle px-4">
            @auth
                <div class="font-medium text-base text-ink">{{ Auth::user()->name }}</div>
                <div class="text-sm text-muted mb-3">{{ Auth::user()->email }}</div>
                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        Edit Profile
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('profile.show', auth()->user())">
                        View Public Profile
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('login')">Log in</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')">Register</x-responsive-nav-link>
                </div>
            @endauth
        </div>
    </div>
</nav>
