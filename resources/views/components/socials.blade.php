@php
	$baseClass = 'socials';
@endphp

<nav {{ $attributes->merge(['class' => ccn($baseClass)]) }}>
	@if (sizeof($socials) > 0)
		@foreach ($socials as $key => $social)
			@if (!empty($social))
				<a href="{{ $social }}" @class([ccn($baseClass, 'social-link')]) target="_blank" rel="noopener noreferrer">
					<span class="sr-only">{!! ucfirst($key) !!}</span>
					<x-contained-icon :icon="ucfirst($key)" type="social" />
				</a>
			@endif
		@endforeach
	@endif
</nav>
