@props(['title', 'subtitle' => null, 'eyebrow' => null, 'accent' => 'olive', 'size' => 'default'])

@php
    $accentText = [
        'olive' => 'text-olive',
        'violet' => 'text-violet',
        'terracotta' => 'text-terracotta',
    ][$accent] ?? 'text-olive';

    $accentHex = [
        'olive' => '#A8B23F',
        'violet' => '#9B8FE0',
        'terracotta' => '#E8703C',
    ][$accent] ?? '#A8B23F';

    $accentHex2 = [
        'olive' => '#E8703C',
        'violet' => '#A8B23F',
        'terracotta' => '#9B8FE0',
    ][$accent] ?? '#E8703C';

    $titleSize = $size === 'lg'
        ? 'text-6xl sm:text-7xl lg:text-8xl'
        : 'text-5xl sm:text-6xl lg:text-7xl';

    $safeTitle = \Illuminate\Support\Str::limit($title, 28);
@endphp

<div class="relative overflow-hidden border-b border-subtle w-full">
    <div class="absolute inset-0 -z-10 opacity-[0.08] pointer-events-none" aria-hidden="true">
        <svg class="absolute top-0 right-0 w-[500px] h-[500px] translate-x-1/4 -translate-y-1/4" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="{{ $accentHex }}" d="M45.3,-58.5C58.5,-49.6,68.6,-34.5,72.1,-17.8C75.6,-1.1,72.5,17.2,63.5,31.9C54.5,46.6,39.6,57.7,22.7,64.2C5.8,70.7,-13.1,72.6,-29.6,66.7C-46.1,60.8,-60.2,47.1,-67.3,30.5C-74.4,13.9,-74.5,-5.6,-67.8,-21.8C-61.1,-38,-47.6,-50.9,-32.6,-59.3C-17.6,-67.7,-1.1,-71.6,13.9,-69.6C28.9,-67.6,32.1,-67.4,45.3,-58.5Z" transform="translate(100 100)" />
        </svg>
        <svg class="absolute bottom-0 left-0 w-[320px] h-[320px] -translate-x-1/3 translate-y-1/3" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="{{ $accentHex2 }}" d="M39.5,-51.5C50.9,-42.1,59.5,-28.9,63.2,-13.9C66.9,1.1,65.7,17.9,58.1,31.3C50.5,44.7,36.5,54.7,20.9,60.4C5.3,66.1,-11.9,67.5,-27.4,62.3C-42.9,57.1,-56.7,45.3,-64.1,30.1C-71.5,14.9,-72.5,-3.7,-66.8,-19.6C-61.1,-35.5,-48.7,-48.7,-34.5,-57.6C-20.3,-66.5,-4.4,-71.1,9.6,-68.5C23.6,-65.9,28.1,-60.9,39.5,-51.5Z" transform="translate(100 100)" />
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        @if($eyebrow)
            <p class="text-xs uppercase tracking-[0.3em] font-semibold {{ $accentText }} mb-4">{{ $eyebrow }}</p>
        @endif

        <h2 class="font-display font-700 {{ $titleSize }} text-ink leading-[0.95] break-words">{{ $safeTitle }}</h2>

        @if($subtitle)
            <p class="text-muted mt-4 text-base max-w-md">{{ $subtitle }}</p>
        @endif
    </div>
</div>
