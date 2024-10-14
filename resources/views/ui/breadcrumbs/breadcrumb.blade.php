@php
	$baseClass = 'breadcrumb';
@endphp

<li @class([ccn($baseClass)])>

	@if ($breadcrumb['url'] === '/' || $breadcrumb['label'] === 'Home')
		<a href="{{ $breadcrumb['url'] }}" @class([ccn($baseClass, 'home')])>
			<x-icon-handler icon="Home" @class(['size-5']) />
		</a>
	@elseif ($breadcrumb['url'] === null)
		<x-text as="span" textStyle="caption">{{ $breadcrumb['label'] }}</x-text>
	@else
		<a href="{{ $breadcrumb['url'] }}" @class([ccn($baseClass, 'link')])>
			<x-text as="span" textStyle="caption">{{ $breadcrumb['label'] }}</x-text>
		</a>
	@endif
	</a>
</li>
