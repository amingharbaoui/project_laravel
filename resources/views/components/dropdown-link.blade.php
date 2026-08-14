@props(['href', 'icon' => null, 'danger' => false])

<a {{ $attributes->merge(['href' => $href, 'class' => 'flex items-center gap-3 w-full px-4 py-2.5 text-start text-sm font-medium transition rounded-lg ' . ($danger ? 'text-terracotta hover:bg-terracotta/10' : 'text-ink hover:bg-white/5')]) }}>
    @if($icon)
        <span class="w-4 h-4 flex-shrink-0">{!! $icon !!}</span>
    @endif
    {{ $slot }}
</a>
