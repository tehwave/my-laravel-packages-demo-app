<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\User;
use App\Timeline\OrderTimelinePresenter;
use App\Timeline\UserTimelinePresenter;
use Illuminate\Support\ServiceProvider;
use tehwave\Timelines\Timeline;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Timeline::present(Order::class, OrderTimelinePresenter::class);
        Timeline::present(User::class, UserTimelinePresenter::class);
    }
}
