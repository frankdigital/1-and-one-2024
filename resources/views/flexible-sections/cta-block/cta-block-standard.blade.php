@php
	$baseClass = 'cta-block-standard';
	$showCta = is_cta_enabled($content['primary_cta']) || is_cta_enabled($content['secondary_cta']);
@endphp

<x-section :contain="false" :dark="true" :scrollId="$section['scroll_id']" @class([ccn($baseClass)])>
	<div @class([ccn($baseClass, 'container')])>
		<div @class([ccn($baseClass, 'gradient')])></div>

		@if (isset($content['image']) && is_image_valid($content['image']))
			<x-parallax @class([ccn($baseClass, 'image-container')])>
				<x-image :image="$content['image']" :fill="true" :size="[2000, 1360]" @class([ccn($baseClass, 'image')]) />
			</x-parallax>
		@endif

		<div @class([ccn($baseClass, 'content-container')])>
			<div @class([ccn($baseClass, 'content')])>

				@if (isset($content['eyebrow']))
					<x-text as="eyebrow">
						{{ $content['eyebrow'] }}
					</x-text>
				@endif

				@if (isset($content['heading']))
					<x-text as="h1">
						{!! $content['heading'] !!}
					</x-text>
				@endif

				@if (isset($content['description']))
					<x-text as="body" :isHTML="true">
						{!! $content['description'] !!}
					</x-text>
				@endif
			</div>

			@if ($showCta)
				<x-cta-container @class([ccn($baseClass, 'cta-container')])>
					<x-cta priority="primary" :cta="$content['primary_cta']" />
					<x-cta priority="secondary" :cta="$content['secondary_cta']" />
				</x-cta-container>
			@endif
		</div>
	</div>
</x-section>
