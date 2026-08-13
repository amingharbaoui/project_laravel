<x-app-layout>
    <x-slot name="header">
        <x-page-header eyebrow="Your account" title="Profile" accent="olive" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <div class="reveal bg-surface border border-olive/30 rounded-3xl p-6">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="reveal bg-surface border border-violet/30 rounded-3xl p-6">
                @include('profile.partials.update-password-form')
            </div>

            <div class="reveal bg-surface border border-terracotta/30 rounded-3xl p-6">
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</x-app-layout>
