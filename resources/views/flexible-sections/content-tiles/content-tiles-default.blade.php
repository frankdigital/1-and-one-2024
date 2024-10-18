@php
	$baseClass = 'content-tiles';
@endphp

<x-section :contain="false" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<x-section-wrap :content="$content" priority="secondary">

			@if (isset($content['tiles']) && count($content['tiles']))
				<div @class([ccn($baseClass, 'tiles'), 'grid', 'grid-cols-3'])>
					@foreach ($content['tiles'] as $tile)
						<div>
							@if (isset($tile['icon']) && !empty($tile['icon']))
								<div @class([ccn($baseClass, 'icon-container')])>
									<x-contained-icon :icon="$tile['icon']" @class([ccn($baseClass, 'icon')]) />
								</div>
							@endif

							<x-text as="h4">
								{{ $tile['heading'] }}
							</x-text>

							<x-text as="body">
								{{ $tile['description'] }}
							</x-text>

							@if (isset($tile['image']) && is_image_valid($tile['image']))
								<div @class([ccn($baseClass, 'image-container')])>
									<x-image :rounded="true" :crop="true" :fill="true" :image="$tile['image']" :size="[814, 1040]"
										@class([ccn($baseClass, 'image')]) />
								</div>
							@endif
						</div>
					@endforeach
				</div>
			@endif

		</x-section-wrap>
	</x-container>
</x-section>
