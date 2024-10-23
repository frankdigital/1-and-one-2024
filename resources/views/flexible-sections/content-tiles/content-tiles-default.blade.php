@php
	$baseClass = 'content-tiles';
@endphp

<x-section :contain="false" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<x-section-wrap :content="$content">
			@if (isset($content['tiles']) && count($content['tiles']))
				<div @class([ccn($baseClass, 'tiles')])>
					<div @class([ccn($baseClass, 'tiles-container')])>
						@foreach ($content['tiles'] as $tile)
							<div @class([ccn($baseClass, 'tile')])>

								<div @class([ccn($baseClass, 'tile-content-container')])>
									@if (isset($tile['icon']) && $tile['icon'])
										<div @class([ccn($baseClass, 'tile-icon-container')])>
											<x-contained-icon :icon="$tile['icon']" @class([ccn($baseClass, 'tile-icon')]) />
										</div>
									@endif

									<div @class([ccn($baseClass, 'tile-content')])>
										@if (isset($tile['heading']) && !empty($tile['heading']))
											<x-text as="h4" @class([ccn($baseClass, 'tile-heading')])>
												{{ $tile['heading'] }}
											</x-text>
											<x-text as="h4" @class([ccn($baseClass, 'tile-heading--hovered')])>
												{{ $tile['heading'] }}
											</x-text>
										@endif

										@if (isset($tile['description']) && !empty($tile['description']))
											<x-wysiwyg @class([
												ccn($baseClass, 'tile-description'),
												ccn($baseClass, 'tile-description--clamped'),
											]) :wysiwyg="$tile['description']" />
											<x-wysiwyg @class([
												ccn($baseClass, 'tile-description'),
												ccn($baseClass, 'tile-description--unclamped'),
											]) :wysiwyg="$tile['description']" />
										@endif

										<div @class([ccn($baseClass, 'tile-cta')])>
											@php
												$tileCta = [
												    'cta' => ['label' => 'Read More'],
												    'priority' => 'text-link',
												    'size' => 'small',
												    'icon' => 'ArrowDown',
												];
											@endphp

											<button data-content-tile-trigger>
												<x-cta-text-link size="small" label="Read More" icon="ArrowDown" />
											</button>
										</div>

										<div @class([ccn($baseClass, 'tile-cta--active')])>
											@php
												$tileCta = [
												    'cta' => ['label' => 'Show Less'],
												    'priority' => 'text-link',
												    'size' => 'small',
												    'icon' => 'ArrowUp',
												];
											@endphp

											<button data-content-tile-trigger>
												<x-cta-text-link size="small" label="Show Less" icon="ArrowUp" />
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
