@php
	$baseClass = 'icon-handler';
@endphp

<span @class([ccn($baseClass), $class])>
	@if ($icon)
		@svg('icons.' . $type . '.' . $icon, ccn($baseClass, 'icon'))
	@endif
</span>
