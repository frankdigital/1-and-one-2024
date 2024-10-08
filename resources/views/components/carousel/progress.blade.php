@php
	$baseClass = 'carousel-progress';
@endphp

<div {{ $attributes->merge(['class' => ccn($baseClass)]) }}>
	<span @class([ccn($baseClass, 'thumb')]) role="progressbar" aria-label="Progress bar" aria-valuenow='0' aria-valuemin='0'
		aria-valuemax='100' data-carousel-progress></span>
</div>
