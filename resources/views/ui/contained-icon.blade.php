@php
	$baseClass = 'contained-icon';
@endphp

<div class="{{ $class }}">
	<div @class([ccn($baseClass, 'icon')])>
		<x-icon-handler :icon="$icon" :type="$type" />
	</div>
</div>
