<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use tehwave\Timelines\Formatting\FormatterReference;
use tehwave\Timelines\Timeline;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::query()->updateOrCreate([
            'email' => 'peter@example.com',
        ], [
            'name' => 'Peter',
            'password' => 'password',
            'email_verified_at' => now(),
        ]);

        $fulfilledOrder = Order::query()->updateOrCreate([
            'number' => '1001',
        ], [
            'user_id' => $user->getKey(),
            'status' => 'fulfilled',
            'total' => 124900,
            'currency' => 'DKK',
        ]);

        Order::query()->updateOrCreate([
            'number' => '1002',
        ], [
            'user_id' => $user->getKey(),
            'status' => 'pending',
            'total' => 49900,
            'currency' => 'DKK',
        ]);

        $fulfilledOrder->timelineEntries()->delete();

        Timeline::record('order.created')
            ->subject($fulfilledOrder)
            ->actor($user)
            ->translation('orders.timeline.created')
            ->context(['order_number' => $fulfilledOrder->number])
            ->occurredAt(now()->subDays(3)->setTime(9, 15))
            ->save();

        Timeline::record('order.payment_received')
            ->subject($fulfilledOrder)
            ->actor($user)
            ->translation('orders.timeline.payment_received')
            ->context([
                'amount' => [
                    'amount' => $fulfilledOrder->total,
                    'currency' => $fulfilledOrder->currency,
                    'minor_units' => true,
                ],
            ])
            ->format(['amount' => 'money'])
            ->occurredAt(now()->subDays(2)->setTime(10, 30))
            ->save();

        Timeline::record('order.note_added')
            ->subject($fulfilledOrder)
            ->actor($user)
            ->translation('orders.timeline.note_added')
            ->context(['note' => 'Leave the parcel by the side door.'])
            ->occurredAt(now()->subDay()->setTime(13, 0))
            ->save();

        Timeline::record('order.fulfilled')
            ->subject($fulfilledOrder)
            ->actor($user)
            ->translation('orders.timeline.fulfilled')
            ->context(['order_number' => $fulfilledOrder->number])
            ->changes([
                'status' => ['before' => 'paid', 'after' => 'fulfilled'],
            ])
            ->formatChanges([
                'status' => FormatterReference::make('enum')->with([
                    'translation_prefix' => 'orders.statuses',
                ]),
            ])
            ->occurredAt(now()->setTime(8, 45))
            ->save();
    }
}
