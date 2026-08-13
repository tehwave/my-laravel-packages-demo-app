<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_the_order_list_has_a_useful_empty_state(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Run the database seeder to add the demo orders.');
    }
}
