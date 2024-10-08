@php
	$baseClass = 'section-wrap';
	$showCta = is_cta_enabled($content['primary_cta']);
@endphp

<div {{ $attributes->merge(['class' => ccn($baseClass)]) }}>
	@if (isset($content['eyebrow']) || isset($content['heading']) || isset($content['description']))
		<div @class([ccn($baseClass, 'header')])>
			@isset($content['eyebrow'])
				<x-text as="eyebrow">
					{{ $content['eyebrow'] }}
				</x-text>
			@endisset

			@isset($content['heading'])
				<x-text as="h2">
					{!! $content['heading'] !!}
				</x-text>
			@endisset

			@isset($content['description'])
				<x-text as="body" :isHTML="true">
					{!! $content['description'] !!}
				</x-text>
			@endisset
		</div>
	@endif
	@if (!$wrapCtaOnMobile && $showCta)
		<x-cta @class([ccn($baseClass, 'cta')]) priority="primary" :cta="$content['primary_cta']" />
	@endisset
	<div @class([ccn($baseClass, 'body')])>
		{!! $slot !!}
	</div>
	@if ($wrapCtaOnMobile && $showCta)
		<x-cta @class([ccn($baseClass, 'cta')]) priority="primary" :cta="$content['primary_cta']" />
	@endisset
</div>
