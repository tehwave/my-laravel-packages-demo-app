<?php

namespace App\Shortcodes;

use tehwave\Shortcodes\Shortcode;

class Callout extends Shortcode
{
    protected $tag = 'callout';

    public function handle(): ?string
    {
        $title = e($this->attributes['title'] ?? 'Note');

        return sprintf(
            '<aside class="rounded-xl border border-indigo-200 bg-indigo-50 p-5"><p class="font-semibold text-indigo-950">%s</p><p class="mt-2 text-indigo-900">%s</p></aside>',
            $title,
            $this->body,
        );
    }
}
