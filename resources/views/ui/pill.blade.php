@php
	$baseClass = 'pill';
@endphp

<div @class([ccn($baseClass), $class])>
	<x-text textStyle="eyebrow" as="span" @class([ccn($baseClass, 'label')])>{{ $slot }}</x-text>
</div>
