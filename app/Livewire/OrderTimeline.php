<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class OrderTimeline extends Component
{
    public Order $order;

    public function mount(Order $order): void
    {
        $this->order = $order;
    }

    public function render(): View
    {
        $entries = $this->order->timelineEntries()
            ->with(['subject', 'actor'])
            ->latestOccurred()
            ->cursorPaginate(3, cursorName: 'livewire_timeline');

        return view('livewire.order-timeline', compact('entries'));
    }
}
