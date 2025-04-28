<?php

namespace Awcodes\Shout\Tests\Fixtures;

use Awcodes\Shout\Components\Shout;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TestForm extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    public ?array $data;

    public static function make(): static
    {
        return new static;
    }

    public function mount(): void
    {
        $this->form->fill([]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->statePath('data')
            ->components([
                //
            ]);
    }

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

    public function data($data): static
    {
        $this->data = $data;

        return $this;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function render(): View
    {
        return view('livewire.form');
    }
}
