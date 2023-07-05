<?php

namespace Awcodes\Shout\Components;

use Closure;
use Filament\Forms\Components\Placeholder;

class Shout extends Placeholder
{
    protected string $type = 'info';

    protected string $view = 'shout::shout';

    protected bool|Closure $isIconHidden = false;

    public function disableIcon(bool|Closure $condition = true): static
    {
        $this->isIconHidden = $condition;

        return $this;
    }

    public function getType(): string
    {
        return $this->evaluate($this->type);
    }

    public function isIconHidden(): bool
    {
        return $this->evaluate($this->isIconHidden);
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();
    }

    public function type(string|Closure $type): static
    {
        if (! in_array($type, ['info', 'success', 'warning', 'danger'])) {
            throw new \InvalidArgumentException("Invalid Shout type [{$type}].");
        }

        $this->type = $type;

        return $this;
    }
}
