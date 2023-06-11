@php
    $type = $getType();
    $isIconHidden = $isIconHidden();
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :state-path="$getStatePath()"
>
    <div
        role="alert"
        {{ $attributes->merge($getExtraAttributes())->class([
            'shout-component border rounded-lg p-4',
            match($type) {
                'success' => 'bg-success-200 border-success-300 text-success-900 dark:border-success-300 dark:bg-success-200',
                'warning' => 'bg-warning-100 border-warning-300 text-warning-900 dark:border-warning-300 dark:bg-warning-200',
                'danger' => 'bg-danger-100 border-danger-300 text-danger-900 dark:border-danger-300 dark:bg-danger-200',
                default => 'bg-info-100 border-info-300 text-info-900 dark:border-info-300 dark:bg-info-200',
            }
        ]) }}
    >
        <div class="flex">
            @if (! $isIconHidden)
                <div @class([
                    'flex-shrink-0 ltr:mr-3 rtl:ml-3',
                    match($type) {
                        'success' => 'text-success-500',
                        'warning' => 'text-warning-500',
                        'danger' => 'text-danger-500',
                        default => 'text-info-500',
                    }
                ])>
                    <svg class="shout-icon h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        @switch($type)
                            @case('success')
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                @break
                            @case('warning')
                                <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                @break
                            @case('danger')
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                                @break
                            @default
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
                                @break
                        @endswitch
                    </svg>
                </div>
            @endif
            <div class="text-sm font-medium">
                {{ $getContent() }}
            </div>
        </div>
    </div>

</x-dynamic-component>
