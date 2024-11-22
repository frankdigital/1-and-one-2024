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

					<nav @class([ccn($baseClass, 'menu-container')])>

						<div>
							<ul @class([ccn($baseClass, 'menu')])>
								@foreach ($item['children'] as $key => $child)
									@if (isset($child) && sizeof($child) > 0)
										<li>
											@include('navigation.shared.menu-expanded-link', [
												'href' => $child['uri'],
												'label' => $child['label'],
												'icon' => isset($child['icon']) && !empty($child['icon']) ? $child['icon'] : null,
												'excerpt' => isset($child['excerpt']) && !empty($child['excerpt']) ? $child['excerpt'] : null,
											])
										</li>
									@endif
								@endforeach
							</ul>
						</div>
					</nav>

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
