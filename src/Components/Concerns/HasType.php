<?php

namespace Awcodes\Shout\Components\Concerns;

use Closure;

trait HasType
{
    protected string $type = 'info';

    public function getType(): string
    {
        return $this->evaluate($this->type);
    }

    public function type(string | Closure $type): static
    {
        if (! in_array($type, ['info', 'success', 'warning', 'danger'])) {
            throw new \InvalidArgumentException("Invalid Shout type [{$type}].");
        }

        $this->type = $type;

        return $this;
    }
}
