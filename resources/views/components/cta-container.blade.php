@php
	$baseClassName = 'cta-container';
	$ctasToDisplay = collect($slot)->filter(fn($child) => $shouldDisplayCta($child));
	$count = $ctasToDisplay->count();
@endphp

<div @class([
	$class,
	ccn($baseClassName),
	ccn($baseClassName, 'single') => $count === 1 && !$fullWidth,
	ccn($baseClassName, 'multiple') => $count >= 2 && !$fullWidth,
	ccn($baseClassName, 'container'),
])>
	{{ $slot }}
</div>
