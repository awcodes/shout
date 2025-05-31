@php
    use Filament\Support\Enums\IconSize;

    $iconSize = $getIconSize();

    if (filled($iconSize) && (! $iconSize instanceof IconSize)) {
        $iconSize = IconSize::tryFrom($iconSize) ?? $iconSize;
    }

    $iconAlias = 'shout::icon.{{ $type }}';

    $panelStyles = \Illuminate\Support\Arr::toCssStyles([
        Filament\Support\get_color_css_variables($color, shades: [100, 300, 600, 900]) => $color !== 'gray',
    ]);
@endphp

<div
    role="alert"
    {{
        $attributes
            ->merge($getExtraAttributes())
            ->class([
                'shout-component border rounded-lg p-4 bg-custom-100 border-custom-300 text-custom-900 dark:border-custom-300 dark:bg-custom-100 dark:text-custom-900',
            ])
    }}
    style="{{ $panelStyles }}"
>
    <div class="flex items-center gap-3">
        @if ($icon)
            <div class="flex-shrink-0">
                {{
                    \Filament\Support\generate_icon_html(icon: $getIcon(), alias: $iconAlias, size: $iconSize ?? IconSize::Small)
                }}
            </div>
        @endif
        <div class="text-sm font-medium">
            {{ $getContent() }}
        </div>
    </div>
</div>
