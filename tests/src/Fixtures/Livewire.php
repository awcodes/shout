<?php

declare(strict_types=1);

namespace Awcodes\Shout\Tests\Fixtures;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Livewire extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public ?array $data;

    public static function make(): static
    {
        return new static;
    }

    public function mount(): void
    {
        $this->form->fill();
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
