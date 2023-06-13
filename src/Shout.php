<?php

namespace Awcodes\Shout;

use Closure;
use Filament\Forms\Components\Placeholder;

class Shout extends Placeholder
{
    protected string $view = 'shout::shout';

    protected string $type = 'info';

    protected bool|Closure $isIconHidden = false;

    public function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();
    }

    public function disableIcon(bool|Closure $condition = true): static
    {
        $this->isIconHidden = $condition;

        return $this;
    }

    public function type(string|Closure $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function isIconHidden(): bool
    {
        return $this->evaluate($this->isIconHidden);
    }

    public function getType(): string
    {
        return $this->evaluate($this->type);
    }
}
