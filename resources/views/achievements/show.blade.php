<x-layouts.app title="Achievements · {{ config('app.name') }}">
    <div class="max-w-3xl">
        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-amber-600">Laravel Achievements</p>
        <h1 class="mt-3 text-4xl font-semibold tracking-tight text-slate-950">Unlock something real.</h1>
        <p class="mt-4 text-lg leading-8 text-slate-600">
            This page uses the package's model trait and public unlock API against the seeded demo user.
        </p>
    </div>

    <section class="demo-card mt-10 max-w-3xl p-6" aria-labelledby="achievement-name">
        <div class="flex items-start gap-5">
            <span class="text-4xl" aria-hidden="true">{{ $achievement->getIcon() }}</span>
            <div class="flex-1">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h2 id="achievement-name" class="text-2xl font-semibold text-slate-950">{{ $achievement->getName() }}</h2>
                    <span class="rounded-full px-3 py-1 text-sm font-semibold {{ $isUnlocked ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-700' }}">
                        {{ $isUnlocked ? 'Unlocked' : 'Locked' }}
                    </span>
                </div>
                <p class="mt-3 text-slate-600">{{ $achievement->getDescription() }}</p>
                <p class="mt-2 text-sm text-slate-500">Demo user: {{ $user->name }} · {{ $user->email }}</p>

                @unless ($isUnlocked)
                    <form method="POST" action="{{ route('achievements.store') }}" class="mt-6">
                        @csrf
                        <button class="rounded-lg bg-amber-600 px-4 py-2 font-semibold text-white hover:bg-amber-700">
                            Unlock achievement
                        </button>
                    </form>
                @endunless
            </div>
        </div>
    </section>
</x-layouts.app>
