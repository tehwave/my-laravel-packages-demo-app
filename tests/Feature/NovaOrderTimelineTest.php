<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class NovaOrderTimelineTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_demo_user_can_view_the_order_timeline_in_nova(): void
    {
        $this->seed();

        $user = User::query()->where('email', 'peter@example.com')->firstOrFail();
        $order = Order::query()->where('number', '1001')->firstOrFail();

        $this->actingAs($user)
            ->getJson('/nova-api/orders/cards?resourceId='.$order->getKey())
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonPath('0.component', 'tehwave-timelines-card')
            ->assertJsonPath('0.heading', 'Order history')
            ->assertJsonPath('0.entries.0.rendered.message', 'Order #1001 was fulfilled.')
            ->assertJsonCount(4, '0.entries');

        $this->actingAs($user)
            ->get('/nova/resources/orders/'.$order->getKey())
            ->assertOk();
    }
}
