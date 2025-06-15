<?php

declare(strict_types=1);

namespace Awcodes\Shout\Components;

use Awcodes\Shout\Components\Concerns\HasActions;
use Awcodes\Shout\Components\Concerns\HasContent;
use Awcodes\Shout\Components\Concerns\HasIcon;
use Awcodes\Shout\Components\Concerns\HasType;
use Exception;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Concerns\HasHeading;
use Filament\Schemas\Components\Concerns\HasName;
use Filament\Support\Concerns\HasColor;
use Filament\Support\Icons\Heroicon;

class Shout extends Component
{
    use HasActions;
    use HasColor;
    use HasContent;
    use HasHeading;
    use HasIcon;
    use HasName;
    use HasType;

    protected string $view = 'shout::components.shout';

    final public function __construct(string $name)
    {
        $this->name($name);
        $this->statePath($name);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrated(false);
    }

    /**  @throws Exception */
    public static function make(?string $name = null): static
    {
        $class = static::class;

        $name ??= static::getDefaultName();

        if (blank($name)) {
            throw new Exception("Shout of class [$class] must have a unique name, passed to the [make()] method.");
        }

        $static = app(static::class, ['name' => $name]);
        $static->configure();

        return $static;
    }

    public static function getDefaultName(): ?string
    {
        return null;
    }

    public function getColor(): string|array|null
    {
        $color = $this->evaluate($this->color);

        if (! $color) {
            return match ($this->getType()) {
                'success' => 'success',
                'warning' => 'warning',
                'danger' => 'danger',
                default => 'info',
            };
        }

        return $color;
    }

    public function getIcon(): string|Heroicon|null
    {
        $icon = $this->evaluate($this->icon);

        if ($icon === false) {
            return null;
        }

        if (! $icon && $icon !== '') {
            return match ($this->getType()) {
                'success' => 'heroicon-o-check-circle',
                'warning' => 'heroicon-o-exclamation-triangle',
                'danger' => 'heroicon-o-x-circle',
                default => 'heroicon-o-information-circle',
            };
        }

        return $icon;
    }
}
