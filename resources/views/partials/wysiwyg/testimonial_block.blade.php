@php
	$baseClass = 'wysiwyg-testimonial-block';
@endphp
<figure @class([ccn($baseClass), $class])>
	@isset($block['testimonial'])
		<blockquote>
			<x-text as="bodyIntro" :isHTML="true" @class([ccn($baseClass, 'testimonial')])>
				{!! $block['testimonial'] !!}
			</x-text>
		</blockquote>
	@endisset
	<figcaption @class([ccn($baseClass, 'footer')])>
		@isset($block['name'])
			<x-text textStyle="bodySmall" as="span" :strong="true"
				@class([ccn($baseClass, 'name')])>{!! $block['name'] !!}</x-text>
		@endisset
		@isset($block['position'])
			<cite>
				<x-text textStyle="bodySmall" as="span" @class([ccn($baseClass, 'position')])>{!! $block['position'] !!}</x-text>
			</cite>
		@endisset
	</figcaption>
</figure>
