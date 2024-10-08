@php
    $baseClass = 'contact-item';
@endphp

<div {{ $attributes->merge(['class' => ccn($baseClass)]) }}>
    <x-icon-handler @class([ccn($baseClass, 'icon')]) :icon="$icon" />
    <div @class([ccn($baseClass, 'copy')])>
        {!! $slot !!}
    </div>
</div>
