<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('orders.index', [
            'orders' => Order::query()->latest()->get(),
        ]);
    }

    public function show(Order $order): View
    {
        $entries = $order->timelineEntries()
            ->with(['subject', 'actor'])
            ->latestOccurred()
            ->cursorPaginate(3, cursorName: 'blade_timeline');

        return view('orders.show', compact('order', 'entries'));
    }
}
