@php
	$baseClass = 'logos-standard';
	$showCta = is_cta_enabled($content['primary_cta']);
@endphp

<x-section :contain="false" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<div @class([ccn($baseClass, 'watermark')])>
			@svg('icons.brand.watermark', ccn($baseClass, 'logo'))
		</div>

		<div @class([ccn($baseClass, 'content-container')])>
			<div @class([ccn($baseClass, 'content')])>
				@if ($content['heading'])
					<x-text as="h3">
						{!! $content['heading'] !!}
					</x-text>
				@endif

				@if ($content['description'])
					<x-text as="body" :isHTML="true">
						{!! $content['description'] !!}
					</x-text>
				@endif
			</div>
			@if ($showCta)
				<x-cta-container :fullWidth="true" @class([
					ccn($baseClass, 'cta-container'),
					ccn($baseClass, 'cta-container--desktop'),
				])>
					<x-cta @class([ccn($baseClass, 'cta')]) priority="primary" :cta="$content['primary_cta']" />
				</x-cta-container>
			@endif
		</div>

		<div @class([ccn($baseClass, 'carousel')]) data-logos-carousel>
			<div @class([ccn($baseClass, 'carousel-child')])>
				@isset($content['images'])
					@foreach ($content['images'] as $logo)
						<div @class([ccn($baseClass, 'carousel-image-container')])>
							<x-image :image="$logo" :fill='true' :size="[182, 140]" @class([ccn($baseClass, 'image')]) />
						</div>
					@endforeach
				@endisset
			</div>
		</div>

		<div @class([ccn($baseClass, 'grid')])>
			@isset($content['images'])
				@foreach ($content['images'] as $logo)
					<div @class([ccn($baseClass, 'grid-image-container')])>
						<x-image :image="$logo" :fill='true' :size="[182, 140]" @class([ccn($baseClass, 'image')]) />
					</div>
				@endforeach
			@endisset
		</div>

		@if ($showCta)
			<x-cta-container :fullWidth="true" @class([
				ccn($baseClass, 'cta-container'),
				ccn($baseClass, 'cta-container--mobile'),
			])>
				<x-cta @class([ccn($baseClass, 'cta')]) priority="primary" :cta="$content['primary_cta']" />
			</x-cta-container>
		@endif
	</x-container>
</x-section>
