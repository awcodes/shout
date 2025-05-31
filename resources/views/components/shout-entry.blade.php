<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <x-shout::shout
        :type="$getType()"
        :color="$getColor()"
        :icon="$getIcon()"
        :iconSize="$getIconSize()"
        :extra-attributes="$getExtraAttributes()"
        :heading="$getHeading()"
        :actions="$getActions()"
    >
        {{ $getContent() }}
    </x-shout::shout>
</x-dynamic-component>
