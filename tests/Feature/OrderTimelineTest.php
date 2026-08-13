<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class OrderTimelineTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_seeded_order_history_is_presented_newest_first(): void
    {
        $this->seed();

        $order = Order::query()->where('number', '1001')->firstOrFail();

        $entries = $order->timelineEntries()
            ->with(['subject', 'actor'])
            ->latestOccurred()
            ->get();

        $this->assertSame([
            'order.fulfilled',
            'order.note_added',
            'order.payment_received',
            'order.created',
        ], $entries->pluck('event')->all());
    }

    public function test_order_page_presents_the_same_history_through_blade_and_livewire(): void
    {
        $this->seed();

        $order = Order::query()->where('number', '1001')->firstOrFail();

        $this->get('/orders/'.$order->getKey())
            ->assertOk()
            ->assertSee('Order 1001')
            ->assertSee('Blade')
            ->assertSee('Livewire')
            ->assertSee('Order #1001 was fulfilled.')
            ->assertSee('Peter')
            ->assertSee('A delivery note was added.')
            ->assertSee('Payment of DKK 1,249.00 was received.');
    }
}
