<?php

declare(strict_types=1);

namespace Workbench\App\Filament\Pages;

use Awcodes\Shout\Components\Shout;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;

class ShoutDemo extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMegaphone;

    protected static ?string $title = 'Shout Workbench';

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                Shout::make('welcome')
                    ->heading('Shout is ready')
                    ->content('This notice is rendered by the package inside a real Filament panel.'),
                Shout::make('warning')
                    ->type('warning')
                    ->content('Types select the notice colour and default icon.'),
                Shout::make('custom')
                    ->heading('Custom presentation')
                    ->content('Colours, icons, sizes, and actions can be configured independently.')
                    ->color(Color::Lime)
                    ->icon(Heroicon::OutlinedSparkles)
                    ->iconSize('lg')
                    ->inlineActions()
                    ->actions([
                        Action::make('documentation')
                            ->label('Read the docs')
                            ->url('https://github.com/awcodes/shout'),
                    ]),
            ]);
    }
}
