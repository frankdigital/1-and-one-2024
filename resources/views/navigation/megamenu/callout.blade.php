@php
	$baseClass = 'megamenu-callout';
@endphp

<div @class([ccn($baseClass)])>
	<x-container width="header">
		@foreach ($menu as $key => $item)
			@if (isset($item['children']) && sizeof($item['children']) > 0)
				<div @class([ccn($baseClass, 'container')]) data-callout-index="{{ $key }}">
					@if (isset($item['featured']) && is_array($item['featured']))
						<div @class([ccn($baseClass, 'background')])></div>
					@endif

					<div @class([ccn($baseClass, 'menu-container')])>
						@foreach ($item['children'] as $key => $children)
							@include('navigation.shared.menu-expanded-link-list', [
								'label' => $children['label'],
								'links' => $children['children'],
							])
						@endforeach
					</div>

					@if (isset($item['featured']) && is_array($item['featured']))
						<div @class([ccn($baseClass, 'featured-container')])>
							<div @class([ccn($baseClass, 'featured')])>

								@php
									$featured = $item['featured'][0];
								@endphp

								@include('navigation.shared.menu-featured-tile', [
									'content' => [
										'image' => $featured['image'],
										'heading' => $featured['heading'],
										'supportingText' => $featured['supporting_text'],
										'cta' => [
											'enable_cta' => true,
											'cta' => [
												'type' => 'link',
												'url' => $featured['link'],
											],
										],
									],
								])
							</div>
						</div>
					@endif
				</div>
			@endif
		@endforeach
	</x-container>

</div>
