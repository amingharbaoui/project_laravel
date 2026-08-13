<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script>
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.add('light');
        }
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:500,600,700|inter:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-ink">

    <div id="dot-bg" class="fixed inset-0 -z-10 pointer-events-none"></div>

    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-10">
        <a href="/" class="mb-8 font-display font-700 text-2xl tracking-tight text-ink hover:opacity-80 transition">
            Sportclub<span class="text-olive">.</span>
        </a>

        <div class="w-full sm:max-w-md bg-surface border border-subtle rounded-3xl p-8 shadow-lg">
            {{ $slot }}
        </div>
    </div>

    @stack('scripts')
</body>
</html>
