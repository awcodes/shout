@php
    use Filament\Support\Enums\IconSize;
    use Illuminate\Support\Arr;
    use Illuminate\Support\HtmlString;
    use function Filament\Support\generate_icon_html;

    $icon = $getIcon();
    $iconSize = $getIconSize();

    if (filled($iconSize) && (! $iconSize instanceof IconSize)) {
        $iconSize = IconSize::tryFrom($iconSize) ?? $iconSize;
    }

    $iconAlias = 'shout::icon.' . $getType();

    $panelStyles = Arr::toCssStyles([
        Filament\Support\get_color_css_variables($getColor(), shades: [100, 200, 300, 400, 600, 900]) => $getColor() !== 'gray',
    ]);

    $actions = collect($getActions())->filter(fn ($action) => $action->isVisible())->all();
    $heading = $getHeading();
    $hasInlineActions = filled($actions) && $hasInlineActions();
    $hasStackedActions = filled($actions) && ! $hasInlineActions;
@endphp

<div
    role="alert"
    {{
        $attributes
            ->merge($getExtraAttributes())
            ->class([
                'shout-component border rounded-lg p-4 bg-custom-100 border-custom-300 text-custom-900 dark:border-custom-400/30 dark:bg-custom-400/10 dark:text-custom-200',
            ])
    }}
    style="{{ $panelStyles }}"
>
    <div class="flex items-center gap-3">
        <div class="flex flex-1 items-start gap-3">
            @if (filled($icon))
                <div
                    @class([
                      'flex-shrink-0',
                      'mt-0.5' => filled($heading),
                    ])
                >
                    {{ generate_icon_html(icon: $icon, alias: $iconAlias, size: $iconSize ?? IconSize::Small)}}
                </div>
            @endif

            <div class="flex flex-1 flex-col gap-3">
                <div>
                    @if ($heading instanceof HtmlString)
                        {!! $heading !!}
                    @elseif (filled($heading))
                        <h2 class="font-bold">
                            {{ $heading }}
                        </h2>
                    @endif

                    <div class="text-sm font-medium">
                        {{ $getContent() }}
                    </div>
                </div>

                @if ($hasStackedActions)
                    <div class="flex items-center gap-3">
                        @foreach ($actions as $action)
                            {{ $action }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        @if ($hasInlineActions)
            <div class="ml-auto flex flex-shrink-0 items-center gap-3">
                @foreach ($actions as $action)
                    {{ $action }}
                @endforeach
            </div>
        @endif
    </div>
</div>
