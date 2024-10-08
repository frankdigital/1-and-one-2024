@php
    $baseClass = 'default-link';
@endphp

<a {{ $attributes->merge(['class' => $getCtaStyles()]) }} href={{ $url }}>
    <span>{{ $title }}</span>
</a>
