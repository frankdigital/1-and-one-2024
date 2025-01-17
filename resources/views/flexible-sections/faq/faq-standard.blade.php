@php
	$baseClass = 'faq-standard';
	$baseClassAccordion = 'accordion';
@endphp

<x-section :scrollId="$section['scroll_id']" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')]) width="small">
		<div @class([ccn($baseClass, 'content-container')])>
			<div @class([ccn($baseClass, 'content')])>
				@if ($content['heading'])
					<x-text as="h3">
						{!! $content['heading'] !!}
					</x-text>
				@endif

				@if ($content['description'])
					<x-text as="body">
						{!! $content['description'] !!}
					</x-text>
				@endif
			</div>
			<div @class([ccn($baseClass, 'faq-content')])>
				@isset($faqs)
					<div @class([ccn($baseClassAccordion)]) data-accordion-container>
						@foreach ($faqs as $key => $faq)
							<x-accordion-item :label="$faq['question']" :content="$faq['answer']" :key="$key" :baseClass="$baseClassAccordion" />
						@endforeach
					</div>
				@endisset
			</div>
		</div>
	</x-container>
</x-section>
