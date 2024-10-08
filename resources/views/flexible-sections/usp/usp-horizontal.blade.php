@php
    $baseClass = 'usps-horizontal';
    $showCta = is_cta_enabled($content['primary_cta']);
@endphp

<x-section @class([ccn($baseClass)])>
    <x-container>
        <x-section-wrap :content="$content">
            @if ($content['usps'])
                <div @class([ccn($baseClass, 'usps')])>
                    @foreach ($content['usps'] as $usp)
                        <x-usp :usp="$usp" />
                    @endforeach
                </div>
            @endif
        </x-section-wrap>
    </x-container>
</x-section>
