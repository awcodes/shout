<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <x-shout::shout
        :type="$getType()"
        :color="$getColor()"
        :icon="$getIcon()"
        :iconSize="$getIconSize()"
        :extra-attributes="$getExtraAttributes()"
    >
        {{ $getContent() }}
    </x-shout::shout>
</x-dynamic-component>
