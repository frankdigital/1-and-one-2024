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
										<div @class([ccn($baseClass, 'icon-container')])>
											<x-icon-handler @class([ccn($baseClass, 'icon')]) icon="ChevronLeft" />
										</div>

										<x-text as="span" textStyle="bodySmall">{!! $item['label'] !!}</x-text>
									</button>
								</div>

								@if (isset($item['children']) && sizeof($item['children']) > 0)
									<div @class([ccn($baseClass, 'menus')])>
										@foreach ($item['children'] as $child)
											@include('navigation.shared.menu-expanded-link-list', [
												'label' => $child['label'],
												'links' => $child['children'],
											])
										@endforeach
									</div>
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

	@if (isset($content['smallLinks']) && sizeof($content['smallLinks']) > 0)
		<nav @class([
			ccn($baseClass, 'menu-container'),
			ccn($baseClass, 'menu-container--secondary'),
		])>
			<ul @class([ccn($baseClass, 'menu')])>
				@foreach ($content['smallLinks'] as $link)
					<li @class([ccn($baseClass, 'item')])>
						<x-small-icon-link icon="Placeholder" :cta="$link['link']" @class([
							ccn($baseClass, 'action'),
							ccn($baseClass, 'action--secondary'),
						]) />
					</li>
				@endforeach
			</ul>
		</nav>
	@endif

	<div @class([ccn($baseClass, 'actions-container')])>
		<div @class([ccn($baseClass, 'cta-container')])>
			<x-cta classes="" size="small" priority="primary" :cta="$content['primary_cta']" />
			<x-cta classes="" size="small" priority="secondary" :cta="$content['secondary_cta']" />
		</div>
	</div>
</div>
