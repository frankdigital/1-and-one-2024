@php
	$baseClass = 'logos-standard';
	$showCta = is_cta_enabled($content['primary_cta']);
@endphp

<x-section :contain="false" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
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
				<x-cta @class([ccn($baseClass, 'cta')]) priority="primary" :cta="$content['primary_cta']" />
			@endif
		</div>
		<div @class([ccn($baseClass, 'logos')])>
			@isset($content['images'])
				@foreach ($content['images'] as $logo)
					<div @class([ccn($baseClass, 'image-container')])>
						<x-image :image="$logo" :fill='true' :size="[182, 140]" @class([ccn($baseClass, 'image')]) />
					</div>
				@endforeach
			@endisset
		</div>
	</x-container>
</x-section>
