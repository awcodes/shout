<?php

declare(strict_types=1);

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
    livewire(TestForm::class)
        ->assertSchemaExists('infolist')
        ->assertSuccessful();
});

class TestForm extends Livewire
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Shout::make('form_shout')
                    ->type('success')
                    ->content('Some test content'),
            ]);
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->record(null)
            ->components([
                Shout::make('infolist_shout')
                    ->type('danger')
                    ->content('Some test content'),
            ]);
    }
}
