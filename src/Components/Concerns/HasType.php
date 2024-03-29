<?php

namespace Awcodes\Shout\Components\Concerns;

use Closure;

trait HasType
{
    protected string | Closure | null $type = null;

    public function getType(): string
    {
        $type = $this->evaluate($this->type) ?? 'info';

        if (! in_array($type, ['info', 'success', 'warning', 'danger'])) {
            throw new \InvalidArgumentException("Invalid Shout type [{$type}].");
        }

        return $type;
    }

    public function type(string | Closure $type): static
    {
        $this->type = $type;

        return $this;
    }
}
