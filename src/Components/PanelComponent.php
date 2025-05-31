<?php

namespace Awcodes\Shout\Components;

use Filament\Support\View\Components\Contracts\HasColor;
use Filament\Support\View\Components\Contracts\HasDefaultGrayColor;

class PanelComponent implements HasColor, HasDefaultGrayColor
{
    /**
     * @param  array<int, string>  $color
     * @return array<string, int>
     */
    public function getColorMap(array $color): array
    {
        return [
            'bg' => 100,
            'dark:bg' => 100,
            'text' => 900,
            'dark:text' => 900,

            'fi-border-color-300',
            'dark:fi-border-color-300',
        ];
    }
}
