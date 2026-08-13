<x-layouts.app title="Shortcodes · {{ config('app.name') }}">
    <div class="max-w-3xl">
        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-indigo-600">Laravel Shortcodes</p>
        <h1 class="mt-3 text-4xl font-semibold tracking-tight text-slate-950">Shortcode playground</h1>
        <p class="mt-4 text-lg leading-8 text-slate-600">
            Application code escapes the source before allowing the shortcode's application-owned markup to render.
        </p>
    </div>

    <div class="mt-10 grid gap-6 lg:grid-cols-2">
        <form method="POST" action="{{ route('shortcodes.compile') }}" class="demo-card p-6">
            @csrf
            <label for="content" class="block text-sm font-semibold text-slate-950">Shortcode source</label>
            <textarea id="content" name="content" rows="9" class="mt-3 w-full rounded-xl border border-slate-300 bg-white p-4 font-mono text-sm">{{ old('content', $sourceContent) }}</textarea>
            @error('content')
                <p class="mt-2 text-sm text-red-700">{{ $message }}</p>
            @enderror
            <button class="mt-4 rounded-lg bg-indigo-600 px-4 py-2 font-semibold text-white hover:bg-indigo-700">
                Compile preview
            </button>
        </form>

        <section class="demo-card p-6" aria-labelledby="compiled-preview">
            <h2 id="compiled-preview" class="text-xl font-semibold text-slate-950">Compiled output</h2>
            <div class="mt-4">{!! $compiledContent !!}</div>
        </section>
    </div>
</x-layouts.app>
