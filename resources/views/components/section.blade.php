@php
	$baseClass = 'section';
@endphp

<section @class([
	ccn($baseClass),
	$class,
	$paddingClass,
	'dark' => $dark,
	ccn($baseClass, 'contain') => $contain,
])>
	{{ $slot }}
</section>
