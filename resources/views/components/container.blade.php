<div {{ $attributes->merge(['class' => implode(' ', [$class, $width])]) }}>
	{!! $slot !!}
</div>
