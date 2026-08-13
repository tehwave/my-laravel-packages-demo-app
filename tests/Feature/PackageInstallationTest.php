<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PackageInstallationTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_local_packages_are_discovered_by_laravel(): void
    {
        $this->assertTrue(class_exists('tehwave\\Achievements\\Achievement'));
        $this->assertTrue(class_exists('tehwave\\Shortcodes\\Shortcode'));
        $this->assertArrayHasKey('make:achievement', Artisan::all());
        $this->assertArrayHasKey('make:shortcode', Artisan::all());
    }

    public function test_home_page_is_a_plain_package_directory(): void
    {
        $this->get(route('orders.index'))
            ->assertOk()
            ->assertSee('composer require tehwave/laravel-timelines')
            ->assertSee('composer require tehwave/laravel-achievements')
            ->assertSee('composer require tehwave/laravel-shortcodes')
            ->assertSee(route('achievements.show'), escape: false)
            ->assertSee(route('shortcodes.show'), escape: false)
            ->assertSee('https://github.com/tehwave/laravel-timelines', escape: false)
            ->assertSee('https://github.com/tehwave/laravel-achievements', escape: false)
            ->assertSee('https://github.com/tehwave/laravel-shortcodes', escape: false)
            ->assertDontSee('Three Laravel packages. One real application.')
            ->assertDontSee('Present deliberate application history')
            ->assertDontSee('Unlock an achievement')
            ->assertDontSee('Compile a shortcode');
    }

    public function test_composer_metadata_identifies_each_package_topic(): void
    {
        $composer = json_decode(
            file_get_contents(base_path('composer.json')),
            associative: true,
            flags: JSON_THROW_ON_ERROR,
        );

        $this->assertContains('timelines', $composer['keywords']);
        $this->assertContains('achievements', $composer['keywords']);
        $this->assertContains('shortcodes', $composer['keywords']);
    }
}
