@php
    $baseClass = 'image-lr-full';
    $showCta = is_cta_enabled($content['primary_cta']) || is_cta_enabled($content['secondary_cta']);
@endphp

<x-section @class([ccn($baseClass)])>
    <x-container width="large" @class([ccn($baseClass, 'container')])>

        @if (isset($content['image']) && is_image_valid($content['image']))
            <div @class([ccn($baseClass, 'image-container')])>
                <x-image :image="$content['image']" :size="[720, 680]" @class([ccn($baseClass, 'image')]) />
            </div>
        @endif

        <div @class([ccn($baseClass, 'content-container')])>
            <div @class([ccn($baseClass, 'content')])>

                @if ($content['eyebrow'])
                    <x-text as="eyebrow">
                        {{ $content['eyebrow'] }}
                    </x-text>
                @endif

                @if ($content['heading'])
                    <x-text as="h3">
                        {{ $content['heading'] }}
                    </x-text>
                @endif

                @if ($content['description'])
                    <x-text as="body" :isHTML="true">
                        {!! $content['description'] !!}
                    </x-text>
                @endif
            </div>

            @if ($showCta)
                <x-cta-container @class([ccn($baseClass, 'cta-container')])>
                    <x-cta classes="" priority="primary" :cta="$content['primary_cta']" />
                    <x-cta classes="" priority="secondary" :cta="$content['secondary_cta']" />
                </x-cta-container>
            @endif
        </div>

    </x-container>
</x-section>
