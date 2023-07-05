@php
    $type = $getType();
    $panelStyles = \Illuminate\Support\Arr::toCssStyles([
        \Filament\Support\get_color_css_variables($type, shades: [100, 300, 600, 900]) => $type !== 'gray',
    ]);
@endphp
<x-dynamic-component :component="$getFieldWrapperView()">
    <div
        role="alert"
        x-load-css="['{{ asset('css/awcodes/shout/shout.css') }}']"
        {{ $attributes->merge($getExtraAttributes())->class([
            'shout-component border rounded-lg p-4 bg-custom-100 border-custom-300 text-custom-900 dark:border-custom-300 dark:bg-custom-100 dark:text-custom-900',
        ]) }}
        style="{{ $panelStyles }}"
    >
        <div class="flex">
            @if (! $isIconHidden())
                <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3 text-custom-600">
                    @switch($type)
                        @case('success')
                            <x-filament::icon
                                alias="awcodes-shout::success"
                                name="heroicon-s-check-circle"
                                size="h-5 w-5"
                            />
                            @break
                        @case('warning')
                            <x-filament::icon
                                alias="awcodes-shout::warning"
                                name="heroicon-s-exclamation-triangle"
                                size="h-5 w-5"
                            />
                            @break
                        @case('danger')
                            <x-filament::icon
                                alias="awcodes-shout::danger"
                                name="heroicon-s-x-circle"
                                size="h-5 w-5"
                            />
                            @break
                        @default
                            <x-filament::icon
                                alias="awcodes-shout::info"
                                name="heroicon-s-information-circle"
                                size="h-5 w-5"
                            />
                            @break
                    @endswitch
                </div>
            @endif
            <div class="text-sm font-medium">
                {{ $getContent() }}
            </div>
        </div>
    </div>

</x-dynamic-component>
