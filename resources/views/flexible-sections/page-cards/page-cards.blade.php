@php
	$baseClass = 'page-cards';
@endphp

<x-section :contain="false" @class([ccn($baseClass), ccn($baseClass . '--' . $columnsCount)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<x-section-wrap :content="$content">
			<div @class([ccn($baseClass, 'cards')])>
				@isset($content['pages'])
					@foreach ($content['pages'] as $pageCard)
						<x-page-card :id="$pageCard" />
					@endforeach
				@endisset
			</div>
		</x-section-wrap>
	</x-container>
</x-section>
