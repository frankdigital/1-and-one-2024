@php
	$baseClass = 'default-link';
@endphp

<a {{ $attributes->merge(['class' => $getCtaStyles(), 'data-obfuscate' => $obfuscateType]) }} href={{ $url }}>
	<span>{{ $title }}</span>
</a>
