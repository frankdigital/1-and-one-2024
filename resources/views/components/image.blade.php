@php
	$baseClass = 'image-resource';
@endphp

<figure @class([
	ccn($baseClass),
	ccn($baseClass, 'rounded') => $rounded,
	ccn($baseClass, 'fill') => $fill,
	$class,
])>
	<img @class([ccn($baseClass, 'image')])
		{{ $attributes->merge(['src' => $bisImage['src'], 'width' => $bisImage['width'], 'height' => $bisImage['height'], 'alt' => $alt, 'priority' => $priority]) }} />

	@if (isset($alt))
		<figcaption @class([ccn($baseClass, 'caption')])>
			Image Description: {{ $alt }}
		</figcaption>
	@endif

</figure>
