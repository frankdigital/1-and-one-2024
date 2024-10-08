@php
    $baseClass = 'icon-handler';
@endphp

<div @class([ccn($baseClass), $class])>
    @if ($icon)
        @svg('icons.' . $type . '.' . $icon, ccn($baseClass, 'icon'))
    @endif
</div>
