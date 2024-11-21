@php
	$baseClass = 'full-width-image-default';
	$showCta = is_cta_enabled($content['primary_cta']);
@endphp

<x-section data-inherit-color="" :scrollId="$section['scroll_id']" :contain="false" @class([
	ccn($baseClass),
	ccn($baseClass, 'reverse') => $content['orientation'] === 'content-right',
])>
	<div @class([ccn($baseClass, 'padding-container')])>
		<x-container width="large" @class([ccn($baseClass, 'container')])>
			<div @class([ccn($baseClass, 'background')])>
				@if (isset($content['image']) && is_image_valid($content['image']))
					<x-parallax @class([ccn($baseClass, 'image-container')])>
						<x-image :image="$content['image']" :fill="true" :size="[2000, 0]" @class([ccn($baseClass, 'image')]) />
					</x-parallax>
				@endif
			</div>

			<div @class([ccn($baseClass, 'content-container')])>
				<div @class([ccn($baseClass, 'content')])>

					@if (isset($content['eyebrow']) && !empty($content['eyebrow']))
						<x-text as="eyebrow">
							{{ $content['eyebrow'] }}
						</x-text>
					@endif

					@if (isset($content['heading']) && !empty($content['heading']))
						<x-text as="h3">
							{!! $content['heading'] !!}
						</x-text>
					@endif

					@if (isset($content['description']) && !empty($content['description']))
						<x-text as="body" :isHTML="true">
							{!! $content['description'] !!}
						</x-text>
					@endif
				</div>

				@if ($showCta)
					<x-cta-container :fullWidth="true" @class([ccn($baseClass, 'cta-container')])>
						<x-cta priority="primary" :cta="$content['primary_cta']" />
					</x-cta-container>
				@endif
			</div>

		</x-container>
	</div>
</x-section>
