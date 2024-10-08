@php
    $baseClass = 'primary-hero-left';
    $showCta = is_cta_enabled($content['primary_cta']) || is_cta_enabled($content['secondary_cta']);
@endphp

<div @class([ccn($baseClass), 'dark'])>
    <x-container @class([ccn($baseClass, 'container')])>

        @if (isset($content['image']) && is_image_valid($content['image']))
            <x-parallax @class([ccn($baseClass, 'image-container')])>
                <x-image :image="$content['image']" :fill="true" :size="[2400, 0]" @class([ccn($baseClass, 'image')]) />
            </x-parallax>
        @endif

        <div @class([ccn($baseClass, 'content-container')])>
            <div @class([ccn($baseClass, 'content')])>
                @if ($content['eyebrow'])
                    <x-text as="eyebrow">
                        {{ $content['eyebrow'] }}
                    </x-text>
                @endif

                @if ($content['heading'])
                    <x-text as="display">
                        {!! $content['heading'] !!}
                    </x-text>
                @endif

                @if ($content['supporting_text'])
                    <x-text as="bodyIntro" :isHTML="true">
                        {!! $content['supporting_text'] !!}
                    </x-text>
                @endif
            </div>

            @if ($showCta)
                <x-cta-container @class([ccn($baseClass, 'cta-container')])>
                    <x-cta classes="" priority="primary" :cta="$content['primary_cta']" />
                    <x-cta classes="" priority="text-link" :cta="$content['secondary_cta']" />
                </x-cta-container>
            @endif
        </div>

        <div @class([ccn($baseClass, 'overlay')])></div>
    </x-container>
</div>
