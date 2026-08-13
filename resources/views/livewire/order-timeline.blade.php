<div class="space-y-5">
    <div class="flex items-center justify-between gap-4">
        <p class="text-sm text-slate-500">Application-owned Livewire retrieval</p>
        <button
            type="button"
            wire:click="$refresh"
            wire:loading.attr="disabled"
            class="rounded-full border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 transition hover:border-indigo-400 hover:text-indigo-700 disabled:opacity-50"
        >
            <span wire:loading.remove>Refresh</span>
            <span wire:loading>Refreshing…</span>
        </button>
    </div>

    <x-timelines::timeline :entries="$entries" />
</div>
