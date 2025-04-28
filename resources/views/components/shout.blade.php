@php
    use Filament\Support\Enums\IconSize;

    $iconSize = $getIconSize();

    if (filled($iconSize) && (! $iconSize instanceof IconSize)) {
        $iconSize = IconSize::tryFrom($iconSize) ?? $iconSize;
    }

    $iconAlias = 'shout::icon.{{ $type }}';
@endphp

<div
    role="alert"
    {{
        $attributes
            ->merge($getExtraAttributes())
            ->class([
                'shout-component border rounded-lg p-4',
            ])
            ->color(\Awcodes\Shout\Components\PanelComponent::class, $getColor())
    }}
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
