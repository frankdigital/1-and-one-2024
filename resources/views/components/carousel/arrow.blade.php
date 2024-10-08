@php
	$baseClass = 'carousel-arrow';
@endphp

<button @class([ccn($baseClass), $baseClass . '--' . $direction]) type='button' aria-label="{{ $direction }} Button"
	data-carousel-{{ $direction }}>
	@if ($direction === 'prev')
		<x-icon-handler icon="ArrowLeft" @class([ccn($baseClass, 'icon')]) />
	@else
		<x-icon-handler icon="ArrowRight" @class([ccn($baseClass, 'icon')]) />
	@endif
</button>
