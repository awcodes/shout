<?php

namespace Awcodes\Shout\Components\Concerns;

use Closure;

trait HasIcon
{
    protected string | Closure | null $icon = null;

    protected string | Closure | null $iconSize = null;

    public function icon(string | Closure $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function iconSize(string | Closure $size): static
    {
        $this->iconSize = $size;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->evaluate($this->icon);
    }

    public function getIconSize(): ?string
    {
        return $this->evaluate($this->iconSize);
    }
}
