@php
	$baseClass = 'service-tile';
@endphp
<article {{ $attributes->merge(['class' => implode(' ', [ccn($baseClass)])]) }}>
	<div @class([ccn($baseClass, 'image-container')])>
		@isset($image)
			<x-image :image="$image" :size="[460, 480]" :crop='true' :fill='true' @class([ccn($baseClass, 'image')]) />
		@endisset
	</div>
	<div @class([ccn($baseClass, 'content-container')])>
		<div @class([ccn($baseClass, 'content')])>
			@isset($heading)
				<x-text as="h4" @class([ccn($baseClass, 'heading')])>
					{!! $heading !!}
				</x-text>
			@endisset
			@isset($description)
				<x-text textStyle="body" as="span" :isHTML="true" @class([ccn($baseClass, 'description')])>
					{!! $description !!}
				</x-text>
			@endisset
		</div>
		<x-cta @class([ccn($baseClass, 'cta')]) priority="text-link" :cta="$cta" />
	</div>
</article>
