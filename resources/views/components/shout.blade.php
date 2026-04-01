@php
    use Filament\Support\Enums\IconSize;
    use Illuminate\Support\Arr;
    use Illuminate\Support\HtmlString;
    use function Filament\Support\generate_icon_html;

    $iconSize = $getIconSize();

    if (filled($iconSize) && (! $iconSize instanceof IconSize)) {
        $iconSize = IconSize::tryFrom($iconSize) ?? $iconSize;
    }

    $iconAlias = 'shout::icon.{{ $type }}';

    $panelStyles = Arr::toCssStyles([
        Filament\Support\get_color_css_variables($getColor(), shades: [100, 300, 600, 900]) => $getColor() !== 'gray',
    ]);

    $actions = collect($getActions())->filter(fn ($action) => $action->isVisible())->all();
    $heading = $getHeading();
    $hasInlineActions = $hasInlineActions();
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
    <div class="flex items-start gap-3">
        @if ($icon)
            <div
                @class([
                  'flex-shrink-0',
                  'mt-0.5' => $heading,
                ])
            >
                {{ generate_icon_html(icon: $getIcon(), alias: $iconAlias, size: $iconSize ?? IconSize::Small)}}
            </div>
        @endif

        <div
            @class([
                'flex flex-1 py-auto gap-3',
                'flex-row items-start' => filled($actions) && $hasInlineActions,
                'flex-col' => filled($actions) && ! $hasInlineActions,
            ])
        >
            <div>
                @if ($heading instanceof HtmlString)
                    {!! $heading !!}
                @else
                    <h2 class="font-bold">
                        {{ $heading }}
                    </h2>
                @endif

                <div class="text-sm font-medium">
                    {{ $getContent() }}
                </div>
            </div>

            @if(filled($actions))
                <div
                    @class([
                        'flex items-center gap-3',
                        'ml-auto flex-shrink-0' => $hasInlineActions,
                    ])
                >
                    @foreach ($actions as $action)
                        {{ $action }}
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
