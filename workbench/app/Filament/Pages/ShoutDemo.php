<?php

declare(strict_types=1);

namespace Workbench\App\Filament\Pages;

use Awcodes\Shout\Components\Shout;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconSize;
use Filament\Support\Icons\Heroicon;

class ShoutDemo extends Page
{
    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedMegaphone;

    protected static ?string $title = 'Shout Workbench';

    public function content(Schema $schema): Schema
    {
        // Each group is one documentation screenshot, framed by its data-focus hook. The text is fixed, so the
        // screenshots are the same on every build. The notice keeps its light colours in dark mode while actions
        // follow the panel theme, so the actions use solid buttons in the notice's own colour to read in both.
        return $schema
            ->components([
                Group::make([
                    Shout::make('type-info')
                        ->content('Your subscription renews on 1 February 2026.'),
                    Shout::make('type-success')
                        ->type('success')
                        ->content('Your changes have been saved.'),
                    Shout::make('type-warning')
                        ->type('warning')
                        ->content('This action cannot be undone.'),
                    Shout::make('type-danger')
                        ->type('danger')
                        ->content('The payment method on file has expired.'),
                ])->extraAttributes(['data-focus' => 'types']),

                Group::make([
                    Shout::make('heading')
                        ->heading('Important Notice')
                        ->content('Scheduled maintenance will take the dashboard offline on Saturday from 02:00 to 04:00 UTC.'),
                    Shout::make('heading-warning')
                        ->type('warning')
                        ->heading('Unsaved changes')
                        ->content('Leaving this page will discard the edits you have made to this record.'),
                ])->extraAttributes(['data-focus' => 'headings']),

                Group::make([
                    Shout::make('color-lime')
                        ->content('Colour set with Color::Lime.')
                        ->color(Color::Lime),
                    Shout::make('color-hex')
                        ->content('Colour set with Color::hex(\'#badA55\').')
                        ->color(Color::hex('#badA55')),
                ])->extraAttributes(['data-focus' => 'colors']),

                Group::make([
                    Shout::make('icon-custom')
                        ->content('A custom icon, Heroicon::AcademicCap.')
                        ->icon(Heroicon::AcademicCap),
                    Shout::make('icon-large')
                        ->content('A larger icon, IconSize::ExtraLarge.')
                        ->iconSize(IconSize::ExtraLarge),
                    Shout::make('icon-none')
                        ->content('No icon at all, with icon(false).')
                        ->icon(false),
                ])->extraAttributes(['data-focus' => 'icons']),

                Group::make([
                    Shout::make('actions-stacked')
                        ->heading('A new version is available')
                        ->content('Review the release notes before upgrading this workspace.')
                        ->actions([
                            Action::make('upgrade')
                                ->label('Upgrade now')
                                ->color('info')
                                ->url('/admin'),
                            Action::make('changelog')
                                ->label('View changelog')
                                ->color('info')
                                ->url('/admin'),
                        ]),
                    Shout::make('actions-inline')
                        ->type('success')
                        ->content('Your export is ready to download.')
                        ->inlineActions()
                        ->actions([
                            Action::make('dismiss')
                                ->label('Dismiss')
                                ->color('success'),
                        ]),
                ])->extraAttributes(['data-focus' => 'actions']),
            ]);
    }
}
