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

    public function test_home_page_links_to_each_package_demo(): void
    {
        $this->get(route('orders.index'))
            ->assertOk()
            ->assertSee(route('achievements.show'), escape: false)
            ->assertSee(route('shortcodes.show'), escape: false);
    }
}
