@php
    $baseClass = 'parallax';
@endphp

<div {{ $attributes->merge(['class' => ccn($baseClass)]) }}>
    <div @class([ccn($baseClass, 'content-container')]) style='top: -{{ $strength }}%; bottom: -{{ $strength }}%;'>
        <div @class([ccn($baseClass, 'content')]) data-parallax='{{ $strength }}'>
            {!! $slot !!}
        </div>
    </div>
</div>
