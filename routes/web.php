<?php

use App\Http\Controllers\AchievementDemoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShortcodeDemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/achievements', [AchievementDemoController::class, 'show'])
    ->name('achievements.show');
Route::post('/achievements', [AchievementDemoController::class, 'store'])
    ->name('achievements.store');
Route::get('/shortcodes', [ShortcodeDemoController::class, 'show'])
    ->name('shortcodes.show');
Route::post('/shortcodes', [ShortcodeDemoController::class, 'compile'])
    ->name('shortcodes.compile');
