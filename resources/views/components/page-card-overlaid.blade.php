@php
	$baseClass = 'page-card-overlaid';
@endphp
<article {{ $attributes->merge(['class' => implode(' ', [ccn($baseClass), 'dark'])]) }}>
	<div @class([ccn($baseClass, 'image-container')])>
		@isset($image)
			<x-image :fill="true" :image="$image" :size="[2000, 1360]" @class([ccn($baseClass, 'image')]) />
		@endisset
	</div>
	<div @class([ccn($baseClass, 'content-container')])>
		<div @class([ccn($baseClass, 'content')])>
			@isset($heading)
				<x-text as="span" textStyle="bodyLarge" @class([ccn($baseClass, 'heading')])>
					{!! $heading !!}
				</x-text>
			@endisset
			@isset($description)
				<x-text textStyle="bodySmall" as="span" :isHTML="true" @class([ccn($baseClass, 'description')])>
					{!! $description !!}
				</x-text>
			@endisset
		</div>
		@isset($cta)
			<x-cta @class([ccn($baseClass, 'cta')]) size='small' priority="text-link" :cta="$cta" />
		@endisset
	</div>
</article>
