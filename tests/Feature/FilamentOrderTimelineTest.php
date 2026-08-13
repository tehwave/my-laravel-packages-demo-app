<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class FilamentOrderTimelineTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_demo_user_can_view_the_order_timeline_in_filament(): void
    {
        $this->seed();

        $user = User::query()->where('email', 'peter@example.com')->firstOrFail();
        $order = Order::query()->where('number', '1001')->firstOrFail();

        $this->actingAs($user)
            ->get('/admin/orders/'.$order->getKey())
            ->assertOk()
            ->assertSee('Order #1001 was fulfilled.')
            ->assertSee('A delivery note was added.');
    }
}
