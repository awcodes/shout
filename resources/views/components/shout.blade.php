@props([
    'type' => 'info',
    'color' => 'info',
    'icon' => 'heroicon-o-information-circle',
    'iconSize' => 'md',
    'extraAttributes' => [],
    'heading' => null,
    'actions' => null,
])

@php
    $iconSize = match ($iconSize) {
        'sm' => 'h-4 w-4',
        'lg' => 'h-8 w-8',
        'xl' => 'h-10 w-10',
        default => 'h-5 w-5',
    };

    $panelStyles = \Illuminate\Support\Arr::toCssStyles([
        \Filament\Support\get_color_css_variables($color, shades: [100, 300, 600, 900]) => $color !== 'gray',
    ]);
@endphp

<div
    role="alert"
    x-data="{}"
    x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('shout', package: 'awcodes/shout'))]"
    {{ $attributes->merge($extraAttributes)->class([
        'shout-component border rounded-lg p-4 bg-custom-100 border-custom-300 text-custom-900 dark:border-custom-300 dark:bg-custom-100 dark:text-custom-900',
    ]) }}
    style="{{ $panelStyles }}"
>
    <div class="flex items-start gap-3">
        @if ($icon)
            <div
                @class([
                  'flex-shrink-0',
                  'mt-0.5' => $heading,
                ])
            >
                <x-filament::icon
                    alias="shout::icon.{{ $type }}"
                    icon="{{ $icon }}"
                    class="{{ $iconSize }} text-custom-600"
                />
            </div>
        @endif

        <div class="flex flex-col flex-1 py-auto gap-3">
            <div>
                @if ($heading instanceof \Illuminate\Support\HtmlString)
                    {!! $heading !!}
                @else
                    <h2 class="font-bold">
                        {{ $heading }}
                    </h2>
                @endif

                <div class="text-sm font-medium">
                    {{ $slot }}
                </div>
            </div>

            @if($actions)
                <div class="flex items-center gap-3">
                    @foreach ($actions as $action)
                        @if ($action->isVisible())
                            {{ $action }}
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
