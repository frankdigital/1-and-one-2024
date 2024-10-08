@php
    $baseClass = 'wysiwyg-cta-block';
@endphp
<div @class([ccn($baseClass), $class])>
    <div @class([ccn($baseClass, 'content-container')])>
        @isset($block['heading'])
            <x-text as="h4">
                {{ $block['heading'] }}
            </x-text>
        @endisset
        @isset($block['description'])
            <x-text as="body" :isHTML="true">
                {!! $block['description'] !!}
            </x-text>
        @endisset
    </div>
    @isset($block['primary_cta'])
        <x-cta @class([ccn($baseClass, 'cta')]) priority="primary" :cta="$block['primary_cta']" />
    @endisset
</div>
