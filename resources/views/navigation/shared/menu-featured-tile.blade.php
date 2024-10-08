@php
	$baseClass = 'menu-featured-tile';
@endphp

<article @class([ccn($baseClass), 'dark'])>
	<div @class([ccn($baseClass, 'image-container')])>
		<x-image :fill="true" :image="$content['image']" :size="[600, 518]" @class([ccn($baseClass, 'image')]) />
	</div>

	<div @class([ccn($baseClass, 'content-container')])>
		<div @class([ccn($baseClass, 'content')])>
			<x-text textStyle="body" as="span" @class([ccn($baseClass, 'heading')])>
				{!! $content['heading'] !!}
			</x-text>

			<x-text textStyle="caption" as="span" @class([ccn($baseClass, 'caption')])>
				{!! $content['supportingText'] !!}
			</x-text>

		</div>

		<x-cta-container @class([ccn($baseClass, 'cta-container')])>
			<x-cta classes="" priority="primary" size="small" :cta="$content['cta']" />
		</x-cta-container>

	</div>
</article>
