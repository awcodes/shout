<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <x-shout::shout
        :type="$getType()"
        :color="$getColor()"
        :icon="$getIcon()"
        :iconSize="$getIconSize()"
        :extra-attributes="$getExtraAttributes()"
        :title="$getTitle()"
    >
        {{ $getContent() }}
    </x-shout::shout>
</x-dynamic-component>
