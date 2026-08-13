<?php

namespace Tests\Feature;

use App\Achievements\PackageExplorer;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class AchievementDemoTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_achievement_page_shows_the_demo_achievement_as_locked(): void
    {
        User::factory()->create([
            'name' => 'Peter',
            'email' => 'peter@example.com',
        ]);

        $this->get('/achievements')
            ->assertOk()
            ->assertSee('Package Explorer')
            ->assertSee('Peter')
            ->assertSee('Locked')
            ->assertSee('Unlock achievement');
    }

    public function test_demo_achievement_is_only_unlocked_once(): void
    {
        $user = User::factory()->create(['email' => 'peter@example.com']);

        $this->post('/achievements')
            ->assertRedirect('/achievements');

        $this->assertTrue($user->hasAchievement(PackageExplorer::class));
        $this->assertDatabaseCount('achievements', 1);

        $this->post('/achievements')
            ->assertRedirect('/achievements');

        $this->assertDatabaseCount('achievements', 1);
    }
}
