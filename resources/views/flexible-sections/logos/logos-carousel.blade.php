@php
	$baseClass = 'logos-carousel';
@endphp

<x-section @class([ccn($baseClass)])>
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
		</div>
		<div @class([ccn($baseClass, 'carousel')]) data-logos-carousel>
			<div @class([ccn($baseClass, 'logos')])>
				@isset($content['images'])
					@foreach ($content['images'] as $logo)
						<div @class([ccn($baseClass, 'image-container')])>
							<x-image :image="$logo" :fill='true' :size="[182, 140]" @class([ccn($baseClass, 'image')]) />
						</div>
					@endforeach
				@endisset
			</div>
		</div>
	</x-container>
</x-section>
