@php
	$baseClass = 'menu-expanded-link-list';
@endphp

<nav @class([ccn($baseClass)])>
	<x-text as="span" textStyle="eyebrow" @class([ccn($baseClass, 'label')])>
		{!! $label !!}
	</x-text>

	@if (isset($links) && sizeof($links) > 0)
		<ul>
			@foreach ($links as $link)
				<li>
					@include('navigation.shared.menu-expanded-link', [
						'href' => $link['uri'],
						'label' => $link['label'],
						'icon' => isset($link['icon']) && !empty($link['icon']) ? $link['icon'] : null,
						'excerpt' => isset($link['excerpt']) && !empty($link['excerpt']) ? $link['excerpt'] : null,
					])
				</li>
			@endforeach
		</ul>
	@endif
</nav>
