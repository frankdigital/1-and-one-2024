@php
	$baseClass = 'wysiwyg-image-block';
@endphp
<div @class([
	ccn($baseClass),
	$class,
	ccn($baseClass . '--narrow') => $block['width'] === 'narrow',
])>
	<div @class([ccn($baseClass, 'image-container')])>
		<x-image :image="$block['image']" :size="[1200, 0]" @class([ccn($baseClass, 'image')]) />

		@if (isset($block['credit']) && !empty($block['credit']))
			<x-caption :caption="$block['credit']" />
		@endif
	</div>
</div>
