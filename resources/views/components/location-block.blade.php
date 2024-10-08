@php
    $baseClass = 'location-block';
    $telephoneLink = 'tel:' . $telephone['number'];
@endphp

<div @class([ccn($baseClass)])>
    <div @class([ccn($baseClass, 'container')])>
        <x-text as="span" textStyle="body" @class([ccn($baseClass, 'heading')])>
            {!! $title !!}
        </x-text>

        @if (isset($address))
            <x-text textStyle="bodySmall" as="span">
                {!! $address !!}
            </x-text>
        @endif

        @if (isset($telephone['formatted_number']) && isset($telephone['number']))
            <x-default-link :url="$telephoneLink" :title="$telephone['formatted_number']" target="_self" size='small' />
        @endif

        <x-cta-container @class([ccn($baseClass, 'cta-container')])>
            <x-cta classes="" priority="primary" :cta="$cta" />
        </x-cta-container>
    </div>
</div>
