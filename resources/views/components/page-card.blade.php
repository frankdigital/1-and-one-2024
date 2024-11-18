@php
	$baseClass = 'page-card';
@endphp
<article @class([ccn($baseClass)]) title="{{ $title }}">
	@isset($image)
		<div @class([ccn($baseClass, 'image-container')])>
			<x-image :image="$image" :fill="true" :size="[588, 360]" @class([ccn($baseClass, 'image')]) />
		</div>
	@endisset
	<div @class([ccn($baseClass, 'content-container')])>
		<div @class([ccn($baseClass, 'content')])>
			@isset($heading)
				<x-text @class([ccn($baseClass, 'heading')]) as="h4">
					{!! $heading !!}
				</x-text>
			@endisset
			@isset($description)
				<x-text @class([ccn($baseClass, 'description')]) as="body" :isHTML="true">
					{!! $description !!}
				</x-text>
			@endisset
		</div>
		{{-- <x-cta @class([ccn($baseClass, 'cta')]) priority="text-link" :cta="$cta" /> --}}
	</div>
</article>
