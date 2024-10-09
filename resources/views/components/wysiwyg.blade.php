@php
	$baseClass = 'wysiwyg';
@endphp

<div {{ $attributes->merge(['class' => ccn($baseClass)]) }}>
	{!! $wysiwyg !!}
</div>
