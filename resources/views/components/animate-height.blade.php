@php
	$baseClass = 'animate-height';
@endphp

<div {{ $attributes->merge(['class' => ccn($baseClass)]) }} data-animate-height>
	{{ $slot }}
</div>
