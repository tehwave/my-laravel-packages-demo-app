<?php

namespace App\Http\Controllers;

use App\Achievements\PackageExplorer;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AchievementDemoController extends Controller
{
    public function show(): View
    {
        $user = $this->demoUser();
        $achievement = new PackageExplorer;

        return view('achievements.show', [
            'user' => $user,
            'achievement' => $achievement,
            'isUnlocked' => $user->hasAchievement($achievement),
        ]);
    }

    public function store(): RedirectResponse
    {
        $user = $this->demoUser();
        $achievement = new PackageExplorer;

        if (! $user->hasAchievement($achievement)) {
            $user->achieve($achievement);
        }

        return to_route('achievements.show')
            ->with('status', 'Achievement unlocked.');
    }

    private function demoUser(): User
    {
        return User::query()
            ->where('email', 'peter@example.com')
            ->firstOrFail();
    }
}
