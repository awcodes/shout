<?php

declare(strict_types=1);

namespace Awcodes\Shout\Components\Concerns;

use Closure;

trait HasActions
{
    protected bool|Closure|null $inlineActions = null;

    public function actions(array|Closure $actions): static
    {
        $this->actions = $this->evaluate($actions);
        $this->registerActions($this->actions);

        return $this;
    }

    public function inlineActions(bool|Closure $position = true): static
    {
        $this->inlineActions = $position;

        return $this;
    }

    public function hasInlineActions(): bool
    {
        return $this->evaluate($this->inlineActions) ?? false;
    }
}
