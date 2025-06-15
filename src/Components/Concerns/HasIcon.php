<?php

declare(strict_types=1);

namespace Awcodes\Shout\Components\Concerns;

use Closure;
use Filament\Support\Enums\IconSize;
use Filament\Support\Icons\Heroicon;

trait HasIcon
{
    protected string|Closure|Heroicon|bool|null $icon = null;

    protected string|Closure|IconSize|null $iconSize = null;

    public function icon(string|Closure|Heroicon|bool $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function iconSize(string|Closure|IconSize $size): static
    {
        $this->iconSize = $size;

        return $this;
    }

    public function getIcon(): string|Heroicon|null
    {
        return $this->evaluate($this->icon);
    }

    public function getIconSize(): string|IconSize|null
    {
        return $this->evaluate($this->iconSize) ?? 'md';
    }
}
