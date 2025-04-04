@php
	$baseClass = 'card-blog';
@endphp

<article @class([ccn($baseClass), ccn($baseClass . '--' . $variant)])>
	<div @class([ccn($baseClass, 'image-container')])>
		@isset($image)
			<x-image :image="$image" :fill="true" :size="[1176, 720]" @class([ccn($baseClass, 'image')]) />
		@endisset

		@if (isset($categories) && sizeof($categories) > 0)
			<div @class([ccn($baseClass, 'categories')])>
				@component('ui.pill', ['class' => ccn($baseClass, 'category')])
					{!! $categories[0]->name !!}
				@endcomponent
			</div>
		@endif

		<div @class([ccn($baseClass, 'gradient')])></div>
	</div>

	<div @class([ccn($baseClass, 'content-container')])>
		@if (!isset($hideDate) || !$hideDate)
			<div @class([ccn($baseClass, 'post-data')])>
				<x-text textStyle="caption" as="span">{{ $date }}</x-text>

				@if (isset($readTime))
					<div @class([ccn($baseClass, 'divider')])></div>
					<x-text textStyle="caption" as="span">{{ $readTime }} min read</x-text>
				@endif
			</div>
		@endif

		<div @class([ccn($baseClass, 'content')])>
			<div @class([ccn($baseClass, 'title')])>
				@isset($heading)
					<x-text as="h5" @class([ccn($baseClass, 'heading')])>
						{!! $heading !!}
					</x-text>
				@endisset
				@isset($description)
					<x-text textStyle="bodySmall" as="span" @class([ccn($baseClass, 'excerpt')])>
						{!! $description !!}
					</x-text>
				@endisset
			</div>

			<div @class([ccn($baseClass, 'cta-container')])>
				<x-cta @class([ccn($baseClass, 'cta')]) priority="text-link" :cta="$cta" />
			</div>
		</div>
	</div>
</article>
