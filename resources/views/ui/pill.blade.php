@php
	$baseClass = 'pill';
@endphp

<div @class([ccn($baseClass), $class])>
	<x-text textStyle="eyebrow" as="span">{{ $slot }}</x-text>
</div>
