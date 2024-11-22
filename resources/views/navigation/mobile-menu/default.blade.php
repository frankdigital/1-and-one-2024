@php
	$baseClass = 'default-mobile-menu';
@endphp

<div @class([ccn($baseClass)])>
	@if (isset($content['menu']) && is_array($content['menu']))
		<nav @class([
			ccn($baseClass, 'menu-container'),
			ccn($baseClass, 'menu-container--primary'),
		])>
			<ul @class([ccn($baseClass, 'menu')])>
				@foreach ($content['menu'] as $key => $item)
					<li @class([ccn($baseClass, 'item')])>
						@if (isset($item['children']) && sizeof($item['children']) > 0)
							<button data-mobile-menu-trigger="{{ $key }}" @class([ccn($baseClass, 'action')])>
								<span @class([ccn($baseClass, 'action-label')])>{{ $item['label'] }}</span>
								<x-icon-handler icon="ChevronRight" @class([ccn($baseClass, 'icon')]) />
							</button>

							<div data-mobile-menu-target="{{ $key }}" @class([
								ccn($baseClass, 'menu-layer'),
								ccn($baseClass, 'menu-layer--' . $key),
							])>
								<div @class([ccn($baseClass, 'back-container')])>
									<button data-mobile-menu-back @class([ccn($baseClass, 'back')])>
										<span @class([ccn($baseClass, 'icon-container')])>
											<x-icon-handler @class([ccn($baseClass, 'icon')]) icon="ChevronLeft" />
										</span>

										<x-text as="span" textStyle="bodySmall">{!! $item['label'] !!}</x-text>
									</button>
								</div>

								@if (isset($item['children']) && sizeof($item['children']) > 0)
									<div @class([ccn($baseClass, 'menus')])>
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

									@if (isset($item['enable_link']) && $item['enable_link'])
										<div @class([ccn($baseClass, 'link-wrapper')])>
											<div @class([ccn($baseClass, 'link-container')])>
												@php
													$cta = build_button_from_link($item['link']['url'], $item['link']['title']);
												@endphp
												<x-cta :cta="$cta" priority="text-link" />
											</div>
										</div>
									@endif
								@endif
							</div>
						@else
							<a href="{{ $item['uri'] }}" @class([ccn($baseClass, 'action')])>
								<span @class([ccn($baseClass, 'action-label')])>{{ $item['label'] }}</span>
							</a>
						@endif
					</li>
				@endforeach
			</ul>
		</nav>
	@endif

	<div @class([ccn($baseClass, 'actions-container')])>
		<div @class([ccn($baseClass, 'cta-container')])>
			@if (is_cta_enabled($content['primary_cta']))
				<x-cta size="small" priority="primary" :cta="$content['primary_cta']" />
			@endif

			@if (is_cta_enabled($content['secondary_cta']))
				<x-cta size="small" priority="text-link" :cta="$content['secondary_cta']" />
			@endif
		</div>
	</div>
</div>
