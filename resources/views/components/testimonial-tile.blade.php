@php
	$baseClass = 'testimonial-tile';
@endphp
<article {{ $attributes->merge(['class' => implode(' ', [ccn($baseClass)])]) }}>
	<div @class([ccn($baseClass, 'content-container')])>
		<div @class([ccn($baseClass, 'content')])>
			@if ($logo && isset($logo))
				<div @class([ccn($baseClass, 'logo-container')])>
					<x-image :image="$logo" :fill="true" :size="[280, 280]" @class([ccn($baseClass, 'logo')]) />
				</div>
			@endif

			<div @class([ccn($baseClass, 'testimonial-content')])>
				@if ($heading)
					<x-text textStyle="h5" as="h5" @class([ccn($baseClass, 'heading')])>
						{!! $heading !!}
					</x-text>
				@endif

				@if ($description)
					<x-text textStyle="body" as="span" @class([ccn($baseClass, 'description')])>
						{!! $description !!}
					</x-text>
				@endif
			</div>

			@isset($author)
				<div @class([ccn($baseClass, 'author-container')])>
					<div @class([ccn($baseClass, 'image-container')])>
						@if ($author['image'] && isset($author['image']))
							<x-image :image="$author['image']" :size="[96, 96]" @class([ccn($baseClass, 'image')]) />
						@endif
					</div>
					<div @class([ccn($baseClass, 'author-content')])>
						@if ($author['name'] && isset($author['name']))
							<x-text textStyle="bodySmall" as="span" :strong="true" @class([ccn($baseClass, 'author-name')])>
								{!! $author['name'] !!}
							</x-text>
						@endif

						@if ($author['position'] && isset($author['position']))
							<x-text textStyle="bodySmall" as="span">
								{!! $author['position'] !!}
							</x-text>
						@endif
					</div>
				</div>
			@endisset
		</div>
	</div>
</article>
