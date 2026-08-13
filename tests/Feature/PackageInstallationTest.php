<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PackageInstallationTest extends TestCase
{
    public function test_local_packages_are_discovered_by_laravel(): void
    {
        $this->assertTrue(class_exists('tehwave\\Achievements\\Achievement'));
        $this->assertTrue(class_exists('tehwave\\Shortcodes\\Shortcode'));
        $this->assertArrayHasKey('make:achievement', Artisan::all());
        $this->assertArrayHasKey('make:shortcode', Artisan::all());
    }
}
