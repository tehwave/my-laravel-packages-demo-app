<?php

use App\Providers\AppServiceProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\NovaServiceProvider;

return [
    AppServiceProvider::class,
    AdminPanelProvider::class,
    NovaServiceProvider::class,
];
