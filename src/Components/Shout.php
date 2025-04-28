<?php

namespace Awcodes\Shout\Components;

use Awcodes\Shout\Components\Concerns\HasContent;
use Awcodes\Shout\Components\Concerns\HasIcon;
use Awcodes\Shout\Components\Concerns\HasType;
use Filament\Schemas\Components\Component;
use Filament\Support\Concerns\HasColor;
use Filament\Support\Icons\Heroicon;

class Shout extends Component
{
    use HasColor;
    use HasContent;
    use HasIcon;
    use HasType;

    protected string $view = 'shout::components.shout';

    public static function make(): static
    {
        return app(static::class);
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

    public function getIcon(): string | Heroicon | null
    {
        $icon = $this->evaluate($this->icon);

        if (! $icon && $icon !== '') {
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
