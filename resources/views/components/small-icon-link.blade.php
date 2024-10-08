@php
	$baseClass = 'small-icon-link';
@endphp

<a @class([ccn($baseClass), $class]) href="{{ $url }}" target="{{ $target }}">
	<x-icon-handler @class([ccn($baseClass, 'icon')]) icon="Placeholder" />

	<x-text @class([ccn($baseClass, 'label')]) as="span" textStyle="bodySmall">
		{{ $title }}
	</x-text>
</a>
