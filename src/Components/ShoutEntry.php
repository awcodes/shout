<?php

namespace Awcodes\Shout\Components;

use Awcodes\Shout\Components\Concerns\HasContent;
use Awcodes\Shout\Components\Concerns\HasIcon;
use Awcodes\Shout\Components\Concerns\HasType;
use Filament\Infolists\Components\Entry;
use Filament\Support\Concerns\HasColor;

class ShoutEntry extends Entry
{
    use HasIcon;
    use HasType;
    use HasContent;
    use HasColor;

    protected string $view = 'shout::components.shout-entry';

    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();
        $this->type('info');
    }

    public function getColor(): string | array | null
    {
        $color = $this->evaluate($this->color);

        if (! $color) {
            return match ($this->getType()) {
                'success' => 'success',
                'warning' => 'warning',
                'danger' => 'danger',
                default => 'info',
            };
        }

        return $color;
    }

    public function getIcon(): string
    {
        $icon = $this->evaluate($this->icon);

        if (! $icon) {
            return match ($this->getType()) {
                'success' => 'heroicon-o-check-circle',
                'warning' => 'heroicon-o-exclamation-triangle',
                'danger' => 'heroicon-o-x-circle',
                default => 'heroicon-o-information-circle',
            };
        }

        return $icon;
    }
}
