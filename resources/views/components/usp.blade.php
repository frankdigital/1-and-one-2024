@php
	$baseClass = 'usp';
@endphp

<div {{ $attributes->merge(['class' => ccn($baseClass)]) }}>
	@if (isset($icon) && $icon)
		<div @class([ccn($baseClass, 'icon-container')])>
			<x-contained-icon :icon="$icon" @class([ccn($baseClass, 'icon')]) />
		</div>
	@endif
	<div @class([ccn($baseClass, 'body')])>
		@if ($heading)
			<x-text as="h5">
				{{ $heading }}
			</x-text>
		@endif

		@if ($description)
			<x-wysiwyg @class([ccn($baseClass), $class]) :wysiwyg="$description" />
		@endif
		@if ($cta && $cta['enable_cta'])
			<x-cta @class([ccn($baseClass, 'cta')]) priority="text-link" :cta="$cta" />
		@endif
	</div>
</div>
