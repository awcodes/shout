<?php

namespace Awcodes\Shout\Components;

use Filament\Support\View\Components\Contracts\HasColor;
use Filament\Support\View\Components\Contracts\HasDefaultGrayColor;

class PanelComponent implements HasColor, HasDefaultGrayColor
{
    /**
     * @param  array<int, string>  $color
     * @return array<string>
     */
    public function getColorClasses(array $color): array
    {
        return [
            'fi-bg-color-100',
            'dark:fi-bg-color-100',
            'fi-border-color-300',
            'dark:fi-border-color-300',
            'fi-text-color-900',
            'dark:fi-text-color-900',
        ];
    }
}
