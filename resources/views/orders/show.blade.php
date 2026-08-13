<x-layouts.app title="Order {{ $order->number }} · {{ config('app.name') }}">
    <a href="{{ route('orders.index') }}" class="text-sm font-semibold text-indigo-700 hover:text-indigo-900">← All orders</a>

    <div class="mt-6 flex flex-wrap items-end justify-between gap-6 border-b border-slate-200 pb-8">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-indigo-600">Presentation comparison</p>
            <h1 class="mt-2 text-4xl font-semibold tracking-tight text-slate-950">Order {{ $order->number }}</h1>
        </div>
        <div class="flex gap-3 text-sm text-slate-600">
            <span class="rounded-full bg-white px-3 py-1.5 shadow-sm">{{ strtoupper($order->currency) }} {{ number_format($order->total / 100, 2) }}</span>
            <span class="rounded-full bg-white px-3 py-1.5 capitalize shadow-sm">{{ $order->status }}</span>
        </div>
    </div>

    <div class="mt-8 grid items-start gap-6 xl:grid-cols-2">
        <section class="demo-card p-6 sm:p-8">
            <div class="mb-6">
                <p class="text-sm font-semibold text-indigo-600">Blade</p>
                <h2 class="mt-1 text-xl font-semibold text-slate-950">Direct package component</h2>
                <p class="mt-2 text-sm leading-6 text-slate-500">The controller owns eager loading, order, and cursor pagination.</p>
            </div>

            <x-timelines::timeline :entries="$entries" />
        </section>

        <section class="demo-card p-6 sm:p-8">
            <div class="mb-6">
                <p class="text-sm font-semibold text-indigo-600">Livewire</p>
                <h2 class="mt-1 text-xl font-semibold text-slate-950">Application-owned host component</h2>
            </div>

            <livewire:order-timeline :order="$order" />
        </section>
    </div>
</x-layouts.app>
