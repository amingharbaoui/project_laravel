@props(['href'])

<a {{ $attributes->merge(['href' => $href, 'class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-ink hover:bg-white/10 focus:outline-none focus:bg-white/10 transition']) }}>
    {{ $slot }}
</a>
