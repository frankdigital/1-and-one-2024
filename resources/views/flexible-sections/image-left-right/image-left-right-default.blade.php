@php
	$baseClass = 'image-lr-default';
	$showCta = is_cta_enabled($content['primary_cta']) || is_cta_enabled($content['secondary_cta']);
@endphp

<x-section :darkerBg="$darkerBg" :contain="false" :scrollId="$section['scroll_id']" @class([
	ccn($baseClass),
	ccn($baseClass . '--image-right') => $orientation === 'image-right',
])>
	<x-container @class([ccn($baseClass, 'container')])>

		@if (isset($content['image']) && is_image_valid($content['image']))
			<div @class([ccn($baseClass, 'image-container')])>
				<x-image :rounded="true" :fill="true" :image="$content['image']" :size="[1200, 1036]" @class([ccn($baseClass, 'image')]) />
			</div>
		@endif

		<div @class([ccn($baseClass, 'content-container')])>
			<div @class([ccn($baseClass, 'content')])>
				@if (isset($content['eyebrow']) && !empty($content['eyebrow']))
					<x-text as="eyebrow">
						{{ $content['eyebrow'] }}
					</x-text>
				@endif

				@if (isset($content['heading']) && !empty($content['heading']))
					<x-text as="h3">
						{{ $content['heading'] }}
					</x-text>
				@endif

				@if (isset($content['description']) && !empty($content['description']))
					<x-wysiwyg @class([ccn($baseClass), $class]) :wysiwyg="$content['description']" />
				@endif
			</div>

			@if ($showCta)
				<x-cta-container :fullWidth="true" @class([ccn($baseClass, 'cta-container')])>
					<x-cta priority="primary" :cta="$content['primary_cta']" />
					<x-cta priority="secondary" :cta="$content['secondary_cta']" />
				</x-cta-container>
			@endif
		</div>

	</x-container>
</x-section>
