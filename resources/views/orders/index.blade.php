<x-layouts.app title="Packages · {{ config('app.name') }}">
    <div class="max-w-3xl">
        <h1 class="text-4xl font-semibold tracking-tight text-slate-950">My Laravel Packages Demo App</h1>
    </div>

    <section class="mt-10" aria-labelledby="timelines-demo">
        <div class="flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <h2 id="timelines-demo" class="text-2xl font-semibold tracking-tight text-slate-950">Laravel Timelines</h2>
                <code class="mt-3 block rounded-md bg-slate-900 px-3 py-2 text-sm text-slate-100">composer require tehwave/laravel-timelines</code>
            </div>
            <a href="https://github.com/tehwave/laravel-timelines" target="_blank" rel="noopener noreferrer" class="text-sm font-semibold text-indigo-700 hover:text-indigo-900">Repository ↗</a>
        </div>

        <div class="mt-5 grid gap-5 md:grid-cols-2">
            @forelse ($orders as $order)
                <a href="{{ route('orders.show', $order) }}" class="demo-card group block p-6 transition hover:-translate-y-0.5 hover:border-indigo-300">
                    <div class="flex items-start justify-between gap-6">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Order</p>
                            <h3 class="mt-1 text-2xl font-semibold tracking-tight text-slate-950">{{ $order->number }}</h3>
                        </div>
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-sm font-medium capitalize text-slate-700">{{ $order->status }}</span>
                    </div>
                    <p class="mt-8 text-sm font-semibold text-indigo-700 group-hover:text-indigo-900">Compare presentations →</p>
                </a>
            @empty
                <div class="demo-card p-6 text-slate-600">Run the database seeder to add the demo orders.</div>
            @endforelse
        </div>
    </section>

    <section class="mt-14" aria-labelledby="package-demos">
        <h2 id="package-demos" class="text-2xl font-semibold tracking-tight text-slate-950">Other packages</h2>
        <div class="mt-5 grid gap-5 md:grid-cols-2">
            <article class="demo-card p-6">
                <h3 class="text-xl font-semibold text-slate-950">Laravel Achievements</h3>
                <code class="mt-3 block overflow-x-auto rounded-md bg-slate-900 px-3 py-2 text-sm text-slate-100">composer require tehwave/laravel-achievements</code>
                <div class="mt-6 flex flex-wrap items-center gap-x-5 gap-y-2 text-sm font-semibold">
                    <a href="{{ route('achievements.show') }}" class="text-amber-700 hover:text-amber-900">Open demo →</a>
                    <a href="https://github.com/tehwave/laravel-achievements" target="_blank" rel="noopener noreferrer" class="text-slate-600 hover:text-slate-900">Repository ↗</a>
                </div>
            </article>
            <article class="demo-card p-6">
                <h3 class="text-xl font-semibold text-slate-950">Laravel Shortcodes</h3>
                <code class="mt-3 block overflow-x-auto rounded-md bg-slate-900 px-3 py-2 text-sm text-slate-100">composer require tehwave/laravel-shortcodes</code>
                <div class="mt-6 flex flex-wrap items-center gap-x-5 gap-y-2 text-sm font-semibold">
                    <a href="{{ route('shortcodes.show') }}" class="text-indigo-700 hover:text-indigo-900">Open demo →</a>
                    <a href="https://github.com/tehwave/laravel-shortcodes" target="_blank" rel="noopener noreferrer" class="text-slate-600 hover:text-slate-900">Repository ↗</a>
                </div>
            </article>
        </div>
    </section>
</x-layouts.app>
