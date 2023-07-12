@props([
    'type' => 'info',
    'color' => 'info',
    'icon' => 'heroicon-o-information-circle',
    'iconSize' => 'md',
    'extraAttributes' => [],
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
    x-load-css="['{{ asset('css/awcodes/shout/shout.css') }}']"
    {{ $attributes->merge($extraAttributes)->class([
        'shout-component border rounded-lg p-4 bg-custom-100 border-custom-300 text-custom-900 dark:border-custom-300 dark:bg-custom-100 dark:text-custom-900',
    ]) }}
    style="{{ $panelStyles }}"
>
    <div class="flex items-center gap-3 rtl:flex-row-reverse">
        @if ($icon)
            <div class="flex-shrink-0">
                <x-filament::icon
                    alias="shout::icon.{{ $type }}"
                    name="{{ $icon }}"
                    size="{{ $iconSize }}"
                    class="text-custom-600"
                />
            </div>
        @endif
        <div class="text-sm font-medium">
            {{ $slot }}
        </div>
    </div>
</div>
