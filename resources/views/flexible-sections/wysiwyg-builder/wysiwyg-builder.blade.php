@php
	$baseClass = 'wysiwyg-builder';
@endphp
<x-section :darkerBg="$darkerBg" :contain="false" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		@isset($content['wysiwyg_builder'])
			@foreach ($content['wysiwyg_builder'] as $item)
				@includeIf("partials.wysiwyg.{$item['acf_fc_layout']}", [
					'section' => $item,
					'class' => ccn($baseClass, 'block'),
				])
			@endforeach
		@endisset
	</x-container>
</x-section>
