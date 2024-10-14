@php
	$baseClass = 'wysiwyg-cta-block';
@endphp
<div @class([ccn($baseClass), $class])>
	<div @class([ccn($baseClass, 'content-container')])>
		@if (isset($block['heading']) && !empty($block['heading']))
			<x-text as="h3">
				{{ $block['heading'] }}
			</x-text>
		@endif
		@if (isset($block['description']) && !empty($block['description']))
			<x-text as="body" :isHTML="true" @class([ccn($baseClass, 'description')])>
				{!! $block['description'] !!}
			</x-text>
		@endif
	</div>

	@if (isset($block['primary_cta']))
		<x-cta @class([ccn($baseClass, 'cta')]) priority="primary" :cta="$block['primary_cta']" />
	@endif
</div>
