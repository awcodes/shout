<?php

namespace Awcodes\Shout\Components\Concerns;

use Closure;

trait HasActions
{
    public function actions(array | Closure $actions): static
    {
        $this->actions = $actions;

        return $this;
    }
}
