@php
	$baseClass = 'faq-with-cta';
	$baseClassAccordion = 'accordion';
	$showCta = is_cta_enabled($content['primary_cta']);
@endphp

<x-section @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
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
			@if ($showCta)
				<x-cta-container @class([ccn($baseClass, 'cta-container')])>
					<x-cta classes="" priority="primary" :cta="$content['primary_cta']" />
				</x-cta-container>
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
	</x-container>
</x-section>
