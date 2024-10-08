@php
    $baseClass = 'base-modal';
@endphp

<div data-modal-container data-disable-hash id="{{ $id }}" @class([ccn($baseClass)])>
    <div @class([ccn($baseClass, 'type--' . $type), ccn($baseClass, 'type')])>{{ $slot }}</div>
</div>
