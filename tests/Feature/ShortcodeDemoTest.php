<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShortcodeDemoTest extends TestCase
{
    public function test_shortcodes_page_compiles_the_default_example(): void
    {
        $this->get('/shortcodes')
            ->assertOk()
            ->assertSee('Shortcode playground')
            ->assertSee('Heads-up')
            ->assertSee('This preview was compiled by Laravel Shortcodes.');
    }

    public function test_submitted_shortcode_content_is_compiled(): void
    {
        $this->post('/shortcodes', [
            'content' => '[callout title=Result]The package found this tag.[/callout]',
        ])
            ->assertOk()
            ->assertSee('Result')
            ->assertSee('The package found this tag.');
    }

    public function test_arbitrary_html_is_escaped_before_compilation(): void
    {
        $this->post('/shortcodes', [
            'content' => '<script>alert("unsafe")</script>[callout]Safe body[/callout]',
        ])
            ->assertOk()
            ->assertDontSee('<script>', escape: false)
            ->assertSee('&lt;script&gt;', escape: false);
    }

    public function test_content_is_required(): void
    {
        $this->from('/shortcodes')
            ->post('/shortcodes', ['content' => ''])
            ->assertRedirect('/shortcodes')
            ->assertSessionHasErrors('content');
    }

    public function test_content_cannot_exceed_the_playground_limit(): void
    {
        $this->from('/shortcodes')
            ->post('/shortcodes', ['content' => str_repeat('a', 5001)])
            ->assertRedirect('/shortcodes')
            ->assertSessionHasErrors('content');
    }
}
