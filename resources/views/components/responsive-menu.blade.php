@php
	$baseClass = 'responsive-menu';
@endphp

<nav @class([ccn($baseClass)])>
	<ul @class([ccn($baseClass, 'list')])>
		@foreach ($menu as $item)
			<li @class([ccn($baseClass, 'item')])>
				@if (isset($item['children']) && sizeof($item['children']) > 0)
					<button @class([ccn($baseClass, 'action')]) data-responsive-menu-trigger>
						<x-text as="span" textStyle="bodySmall" :strong="true"
							@class(ccn($baseClass, 'item-text'))>{!! $item['label'] !!}</x-text>

						<span @class([ccn($baseClass, 'item-icon-container')])>
							<x-icon-handler @class([ccn($baseClass, 'icon')]) icon="SharpChevronDown" />
						</span>
					</button>

					<div data-header-megamenu @class([ccn($baseClass, 'mega-menu')])>

						@include('navigation.megamenu.callout-single', [
							'item' => $item,
							'key' => $loop->index,
						])

					</div>
				@else
					<a href="{{ $item['uri'] }}" data-responsive-menu-trigger @class([ccn($baseClass, 'action')])>
						<x-text as="span" textStyle="bodySmall" :strong="true"
							@class(ccn($baseClass, 'item-text'))>{!! $item['label'] !!}</x-text>
					</a>
				@endif
			</li>
		@endforeach
	</ul>
</nav>
