@php
	$baseClass = 'tabs-list';
@endphp
@if (count($tabs))
	<div {{ $attributes->merge(['class' => ccn($baseClass)]) }}>
		<nav @class([ccn($baseClass, 'list')]) role="tablist" aria-label="{{ sanitize_title($label) }}">
			@foreach ($tabs as $tab)
				<button role="tab" aria-selected="false" aria-controls="tabpanel-{{ sanitize_title($tab) }}" id="tab-id"
					@class([ccn($baseClass, 'tab')])>{!! $tab !!}</button>
			@endforeach
		</nav>
		<span @class([ccn($baseClass, 'overlay'), ccn($baseClass, 'overlay--left')])></span>
		<span @class([
			ccn($baseClass, 'overlay'),
			ccn($baseClass, 'overlay--right'),
		])></span>
	</div>
@endif
