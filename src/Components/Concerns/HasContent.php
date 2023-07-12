<?php

namespace Awcodes\Shout\Components\Concerns;

trait HasContent
{
    protected mixed $content = null;

    public function content(mixed $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(): mixed
    {
        return $this->evaluate($this->content);
    }
}
