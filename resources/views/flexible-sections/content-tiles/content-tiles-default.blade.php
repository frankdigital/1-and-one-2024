@php
	$baseClass = 'content-tiles';
@endphp

<x-section :contain="false" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<x-section-wrap @class([ccn($baseClass, 'section-wrap')]) :content="$content">
		</x-section-wrap>

		@if (isset($content['tiles']) && count($content['tiles']))
			<div @class([ccn($baseClass, 'tiles')])>
				<div @class([ccn($baseClass, 'tiles-container')])>
					@foreach ($content['tiles'] as $tile)
						<div @class([ccn($baseClass, 'tile')])>
							@if (isset($tile['icon']) && $tile['icon'])
								<div @class([ccn($baseClass, 'icon-container')])>
									<x-contained-icon :icon="$tile['icon']" @class([ccn($baseClass, 'icon')]) />
								</div>
							@endif
							<div @class([ccn($baseClass, 'text-content')])>
								@if (isset($tile['heading']) && !empty($tile['heading']))
									<x-text as="h4">
										{{ $tile['heading'] }}
									</x-text>
								@endif

								@if (isset($tile['description']) && !empty($tile['description']))
									<x-wysiwyg @class([ccn($baseClass, 'description'), $class]) :wysiwyg="$tile['description']" />
								@endif

								<div @class([ccn($baseClass, 'read-more')])>
									<x-text as="a">
										{{ __('Read More') }}
									</x-text>
								</div>
								@if (isset($tile['image']) && is_image_valid($tile['image']))
									<div @class([ccn($baseClass, 'image-container')])>
										<x-image :rounded="true" :fill="true" :image="$tile['image']" :size="[812, 1040]"
											@class([ccn($baseClass, 'image')]) />
									</div>
								@endif
							</div>
						</div>
					@endforeach
				</div>
		@endif
	</x-container>
</x-section>
