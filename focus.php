<?php

declare(strict_types=1);

use Awcodes\Focus\Card;
use Awcodes\Focus\Enums\Size;
use Awcodes\Focus\Screenshot;
use Awcodes\Focus\ScreenshotSuite;

/*
 * Documentation screenshots for Shout, generated with awcodes/focus from the Workbench (run `composer build`
 * first). The Workbench demo page renders every variant with fixed text, so the notices are the same on every build.
 */

// The awcodes card templates frame each screenshot at 1400x816. The demo page's notices are wide and short, so the
// card source is captured in that shape at three-quarter size and the template scales it up.
$cardPage = [1050, 612];

// Documentation screenshots use the narrowest desktop layout, so a notice is about as wide as it is in a typical
// form. The groups on the demo page are 24px apart, so 16px of padding keeps the neighbouring group out of frame.
$docs = [1024, 900];

return ScreenshotSuite::make()
    ->screenshots([
        Screenshot::make('types')
            ->viewportSize(...$docs)
            ->visit('/admin/shout-demo')
            ->focus('[data-focus="types"]')
            ->padding(16),

        Screenshot::make('headings')
            ->viewportSize(...$docs)
            ->visit('/admin/shout-demo')
            ->focus('[data-focus="headings"]')
            ->padding(16),

        Screenshot::make('colors')
            ->viewportSize(...$docs)
            ->visit('/admin/shout-demo')
            ->focus('[data-focus="colors"]')
            ->padding(16),

        Screenshot::make('icons')
            ->viewportSize(...$docs)
            ->visit('/admin/shout-demo')
            ->focus('[data-focus="icons"]')
            ->padding(16),

        Screenshot::make('actions')
            ->viewportSize(...$docs)
            ->visit('/admin/shout-demo')
            ->focus('[data-focus="actions"]')
            ->padding(16),

        // The share-image source, shaped to the card templates' screenshot slots. The two-up templates show it
        // light in slot 2, the large screenshot at the back, and dark in slot 1, the smaller one in front at the
        // lower left, so it is captured in both themes.
        Screenshot::make('card-page')
            ->viewportSize(...$cardPage)
            ->visit('/admin/shout-demo')
            ->viewport(),
    ])
    ->cardTemplates('https://github.com/awcodes/focus-templates/tree/v2.0.0/dist')
    ->cards([
        // Open Graph and the GitHub social preview share one 2400x1260 template; GitHub crops 30px top and bottom.
        Card::make('social')
            ->template('two-up-wide')
            ->title('Shout')
            ->screenshots(['card-page', 'card-page'])
            ->sizes([Size::OpenGraph, Size::GitHubSocial]),

        // The Filament plugin directory's 2560x1440 thumbnail.
        Card::make('thumbnail')
            ->template('two-up')
            ->title('Shout')
            ->screenshots(['card-page', 'card-page'])
            ->sizes([Size::Filament]),
    ]);
