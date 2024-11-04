@php
	$baseClass = 'page-cards-overlaid';
@endphp

<x-section :scrollId="$section['scroll_id']" @class([ccn($baseClass)])>
	<x-container width="large" @class([ccn($baseClass, 'container')])>
		<div @class([ccn($baseClass, 'content')])>
			@isset($content['eyebrow'])
				<x-text as="eyebrow">
					{{ $content['eyebrow'] }}
				</x-text>
			@endisset

			@isset($content['heading'])
				<x-text as="h2">
					{{ $content['heading'] }}
				</x-text>
			@endisset

			@isset($content['description'])
				<x-text as="body" :isHTML="true">
					{!! $content['description'] !!}
				</x-text>
			@endisset
		</div>
		<div @class([ccn($baseClass, 'cards')])>
			@isset($content['pages'])
				@foreach ($content['pages'] as $pageCard)
					<x-page-card-overlaid :id="$pageCard" />
				@endforeach
			@endisset
		</div>
	</x-container>
</x-section>
