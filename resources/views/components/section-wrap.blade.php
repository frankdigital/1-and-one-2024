@php
	$baseClass = 'section-wrap';
	$showCta = isset($content['primary_cta']) && is_cta_enabled($content['primary_cta']);
@endphp

<div {{ $attributes->merge(['class' => ccn($baseClass)]) }}>
	@if (isset($content['eyebrow']) || isset($content['heading']) || isset($content['description']))
		<div @class([ccn($baseClass, 'header')])>
			@if (isset($content['eyebrow']) && !empty($content['eyebrow']))
				<x-text as="eyebrow">
					{{ $content['eyebrow'] }}
				</x-text>
			@endif

			@if (isset($content['heading']) && !empty($content['heading']))
				<x-text as="h2">
					{!! $content['heading'] !!}
				</x-text>
			@endif

			@if (isset($content['description']) && !empty($content['description']))
				<x-text as="body" :isHTML="true">
					{!! $content['description'] !!}
				</x-text>
			@endif
		</div>
	@endif
	@if (!$wrapCtaOnMobile && $showCta)
		<x-cta @class([ccn($baseClass, 'cta')]) :priority="$priority" :cta="$content['primary_cta']" />
	@endif
	<div @class([ccn($baseClass, 'body')])>
		{!! $slot !!}
	</div>
	@if ($wrapCtaOnMobile && $showCta)
		<x-cta @class([ccn($baseClass, 'cta')]) :priority="$priority" :cta="$content['primary_cta']" />
	@endif
</div>
