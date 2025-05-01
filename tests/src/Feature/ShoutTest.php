<?php

use Awcodes\Shout\Components\Shout;
use Awcodes\Shout\Tests\Fixtures\Livewire;
use Awcodes\Shout\Tests\TestCase;
use Filament\Schemas\Schema;

use function Pest\Livewire\livewire;

uses(TestCase::class);

it('renders in form correctly', function () {
    livewire(TestForm::class)
        ->assertSchemaExists('form')
        ->assertSuccessful();
});

it('renders in infolist correctly', function () {
    livewire(TestInfolist::class)
        ->assertSuccessful();
});

class TestForm extends Livewire
{
    public function form(Schema $form): Schema
    {
        return $form
            ->statePath('data')
            ->components([
                Shout::make()
                    ->type('success')
                    ->content('Some test content'),
            ]);
    }
}

class TestInfolist extends Livewire
{
    public function infolist(Schema $infolist): Schema
    {
        return $infolist
            ->record(null)
            ->components([
                Shout::make()
                    ->type('danger')
                    ->content('Some test content'),
            ]);
    }
}
