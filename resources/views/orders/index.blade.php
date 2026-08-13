<x-layouts.app title="Orders · {{ config('app.name') }}">
    <div class="max-w-3xl">
        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-indigo-600">Laravel Timelines</p>
        <h1 class="mt-3 text-4xl font-semibold tracking-tight text-slate-950">A real host-app sanity check.</h1>
        <p class="mt-4 text-lg leading-8 text-slate-600">
            Each surface retrieves the same deliberate order history in application code, then hands the prepared entries to the package for presentation.
        </p>
    </div>

    <div class="mt-10 grid gap-5 md:grid-cols-2">
        @forelse ($orders as $order)
            <a href="{{ route('orders.show', $order) }}" class="demo-card group block p-6 transition hover:-translate-y-0.5 hover:border-indigo-300">
                <div class="flex items-start justify-between gap-6">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Order</p>
                        <h2 class="mt-1 text-2xl font-semibold tracking-tight text-slate-950">{{ $order->number }}</h2>
                    </div>
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-sm font-medium capitalize text-slate-700">{{ $order->status }}</span>
                </div>
                <p class="mt-8 text-sm font-semibold text-indigo-700 group-hover:text-indigo-900">Compare presentations →</p>
            </a>
        @empty
            <div class="demo-card p-6 text-slate-600">Run the database seeder to add the demo orders.</div>
        @endforelse
    </div>

    <section class="mt-14" aria-labelledby="package-demos">
        <h2 id="package-demos" class="text-2xl font-semibold tracking-tight text-slate-950">Package demos</h2>
        <div class="mt-5 grid gap-5 md:grid-cols-2">
            <a href="{{ route('achievements.show') }}" class="demo-card block p-6 transition hover:-translate-y-0.5 hover:border-amber-300">
                <p class="text-sm font-semibold text-amber-700">Laravel Achievements</p>
                <h3 class="mt-2 text-xl font-semibold text-slate-950">Unlock an achievement</h3>
                <p class="mt-3 text-slate-600">Exercise the model trait, metadata, persistence, and idempotent unlock flow.</p>
            </a>
            <a href="{{ route('shortcodes.show') }}" class="demo-card block p-6 transition hover:-translate-y-0.5 hover:border-indigo-300">
                <p class="text-sm font-semibold text-indigo-700">Laravel Shortcodes</p>
                <h3 class="mt-2 text-xl font-semibold text-slate-950">Compile a shortcode</h3>
                <p class="mt-3 text-slate-600">Edit source content and inspect the safely rendered application shortcode.</p>
            </a>
        </div>
    </section>
</x-layouts.app>
