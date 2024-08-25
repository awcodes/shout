<?php

namespace Awcodes\Shout\Tests\Fixtures;

use Awcodes\Shout\Components\Shout;
use Filament\Forms\Form;

class TestFieldComponent extends TestForm
{
    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                Shout::make('notice')
                    ->content('Some test content'),
            ]);
    }
}
