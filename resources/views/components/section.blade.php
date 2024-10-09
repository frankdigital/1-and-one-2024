@php
	$baseClass = 'section';
@endphp

<section @class([
	ccn($baseClass),
	ccn($baseClass . '--darker') => $darkerBg,
	$class,
	$paddingClass,
	'dark' => $dark,
	ccn($baseClass, 'contain') => $contain,
])>
	{{ $slot }}
</section>
