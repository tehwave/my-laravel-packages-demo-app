<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use tehwave\Shortcodes\Shortcode;

class ShortcodeDemoController extends Controller
{
    private const DEFAULT_CONTENT = '[callout title=Heads-up]This preview was compiled by Laravel Shortcodes.[/callout]';

    public function show(): View
    {
        return $this->render(self::DEFAULT_CONTENT);
    }

    public function compile(Request $request): View
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:5000'],
        ]);

        return $this->render($validated['content']);
    }

    private function render(string $sourceContent): View
    {
        return view('shortcodes.show', [
            'sourceContent' => $sourceContent,
            'compiledContent' => Shortcode::compile(e($sourceContent)),
        ]);
    }
}
