@php
	$baseClass = 'cta-block-contained';
	$showCta = is_cta_enabled($content['primary_cta']) || is_cta_enabled($content['secondary_cta']);
@endphp

<x-section data-inherit-color="" :contain="false" :dark="true" :scrollId="$section['scroll_id']" @class([ccn($baseClass), ccn($baseClass . '--last') => $last])>
	<x-container @class([ccn($baseClass, 'container')])>
		<div @class([ccn($baseClass, 'margin')])>
			<div @class([ccn($baseClass, 'gradient')])></div>

			@if (isset($content['image']) && is_image_valid($content['image']))
				<x-parallax @class([ccn($baseClass, 'image-container')])>
					<x-image :rounded="true" :image="$content['image']" :fill="true" :size="[2000, 0]" @class([ccn($baseClass, 'image')]) />
				</x-parallax>
			@endif

			<div @class([ccn($baseClass, 'content-container')])>
				<div @class([ccn($baseClass, 'content')])>
					@if (isset($content['eyebrow']) && !empty($content['eyebrow']))
						<x-text as="eyebrow">
							{{ $content['eyebrow'] }}
						</x-text>
					@endif

					@if (isset($content['heading']))
						<x-text as="span" textStyle="h1">
							{!! $content['heading'] !!}
						</x-text>
					@endif

					@if (isset($content['description']))
						<x-text as="bodyLarge" :isHTML="true">
							{!! $content['description'] !!}
						</x-text>
					@endif
				</div>

				@if ($showCta)
					<x-cta-container @class([ccn($baseClass, 'cta-container')])>
						<x-cta priority="primary" :cta="$content['primary_cta']" />
						<x-cta priority="text-link" :cta="$content['secondary_cta']" />
					</x-cta-container>
				@endif
			</div>
		</div>
	</x-container>
</x-section>
