<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="min-h-screen text-slate-900 antialiased">
        <header class="border-b border-slate-200/80 bg-white/80 backdrop-blur">
            <div class="mx-auto flex max-w-7xl flex-col items-start gap-4 px-6 py-4 sm:flex-row sm:items-center sm:justify-between sm:gap-6">
                <a href="{{ route('orders.index') }}" class="whitespace-nowrap text-sm font-semibold tracking-tight text-slate-950 sm:text-base">
                    My Laravel Packages Demo App
                </a>

                <nav class="flex w-full flex-wrap items-center gap-x-4 gap-y-2 text-sm font-medium text-slate-600 sm:w-auto" aria-label="Demo surfaces">
                    <a href="{{ route('orders.index') }}" class="hover:text-indigo-700">Blade &amp; Livewire</a>
                    <a href="/admin" class="hover:text-indigo-700">Filament</a>
                    <a href="/nova" class="hover:text-indigo-700">Nova</a>
                    <a href="{{ route('achievements.show') }}" class="hover:text-amber-700">Achievements</a>
                    <a href="{{ route('shortcodes.show') }}" class="hover:text-indigo-700">Shortcodes</a>
                </nav>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-6 py-12">
            {{ $slot }}
        </main>

        @livewireScripts
    </body>
</html>
