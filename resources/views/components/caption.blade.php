@php
    $baseClass = 'caption';
@endphp

<div @class([ccn($baseClass)])>
    <x-icon-handler @class([ccn($baseClass, 'icon')]) icon="Camera" />
    <x-text as="caption">
        {{ $caption }}
    </x-text>
</div>
