@php
	$baseClass = 'intro';
	$showCta = is_cta_enabled($content['primary_cta']);
@endphp

<x-section :scrollId="$section['scroll_id']" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<div @class([ccn($baseClass, 'content-container')])>
			<div @class([ccn($baseClass, 'content')])>
				@if ($content['eyebrow'])
					<x-text as="eyebrow">
						{{ $content['eyebrow'] }}
					</x-text>
				@endif
				@if ($content['heading'])
					<x-text as="h2">
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
				<x-cta-container :fullWidth="true" @class([ccn($baseClass, 'cta-container')])>
					<x-cta @class([ccn($baseClass, 'cta')]) :cta="$content['primary_cta']" />
				</x-cta-container>
			@endif
		</div>
		@if (isset($content['image']) && is_image_valid($content['image']))
			<div @class([ccn($baseClass, 'image-container')])>
				<x-image :rounded="true" :image="$content['image']" :size="[1200, 0]" @class([ccn($baseClass, 'image')]) />
			</div>
		@endif
	</x-container>
</x-section>
