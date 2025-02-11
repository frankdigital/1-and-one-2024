@php
	$baseClass = 'content-tiles';
@endphp

<x-section :contain="false" :scrollId="$section['scroll_id']" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<x-section-wrap :wrapCtaOnMobile="false" :content="$content">
			@if (isset($content['tiles']) && count($content['tiles']))
				<div @class([ccn($baseClass, 'tiles')])>
					<div @class([ccn($baseClass, 'tiles-container')])>
						@foreach ($content['tiles'] as $tile)
							<div data-content-tile @class([ccn($baseClass, 'tile')]) tabindex="0">

								<div @class([ccn($baseClass, 'tile-content-container')])>
									@if (isset($tile['icon']) && $tile['icon'])
										<div @class([ccn($baseClass, 'tile-icon-container')])>
											<x-contained-icon :icon="$tile['icon']" @class([ccn($baseClass, 'tile-icon')]) />
										</div>
									@endif

									<div data-content-tile-content @class([ccn($baseClass, 'tile-content')])>
										@if (isset($tile['heading']) && !empty($tile['heading']))
											<x-text as="h4" @class([ccn($baseClass, 'tile-heading')])>
												{{ $tile['heading'] }}
											</x-text>
										@endif

										@if (isset($tile['description']) && !empty($tile['description']))
											<div data-content-tile-description @class([ccn($baseClass, 'tile-description-container')])>
												<x-text as="span" textStyle="body" @class([ccn($baseClass, 'tile-description')])>
													{{ $tile['description'] }}
												</x-text>
											</div>
										@endif

										<div @class([ccn($baseClass, 'tile-cta')])>
											<button data-content-tile-trigger>
												<x-cta-text-link class="inactive" size="small" label="Read More" icon="ArrowDown" />
												<x-cta-text-link class="active" size="small" label="Show Less" icon="ArrowUp" />
											</button>
										</div>

									</div>
								</div>

								@if (isset($tile['image']) && is_image_valid($tile['image']))
									<div @class([ccn($baseClass, 'tile-image-container')])>

										<x-image :rounded="true" :fill="true" :image="$tile['image']" :size="[812, 1040]"
											@class([ccn($baseClass, 'tile-image')]) />

									</div>
								@endif

								<div @class([ccn($baseClass, 'tile-image-gradient')])></div>
								<div @class([ccn($baseClass, 'background')])></div>
							</div>
						@endforeach
					</div>
				</div>
			@endif
		</x-section-wrap>
	</x-container>
</x-section>
