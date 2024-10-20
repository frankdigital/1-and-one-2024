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
					</button>
				@else
					<a href="{{ $item['uri'] }}">
						<x-text as="span" textStyle="bodySmall" :strong="true"
							@class(ccn($baseClass, 'item-text'))>{!! $item['label'] !!}</x-text>
					</a>
				@endif
			</li>
		@endforeach
	</ul>
</nav>
