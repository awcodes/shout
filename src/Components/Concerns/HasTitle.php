<?php

namespace Awcodes\Shout\Components\Concerns;

trait HasTitle
{
    protected mixed $title = null;

    public function title(mixed $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): mixed
    {
        return $this->evaluate($this->title);
    }
}
