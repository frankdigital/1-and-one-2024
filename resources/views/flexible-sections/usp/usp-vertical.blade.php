@php
	$baseClass = 'usps-vertical';
	$showCta = is_cta_enabled($content['primary_cta']);
@endphp
<x-section :darkerBg="$darkerBg" :contain="false" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<div @class([ccn($baseClass, 'sidebar')])>

			<div @class([ccn($baseClass, 'content-container')])>
				<div @class([ccn($baseClass, 'content')])>
					@if ($content['heading'])
						<x-text as="h2" :isHTML="true">
							{!! $content['heading'] !!}
						</x-text>
					@endif

					@if ($content['description'])
						{{-- <x-wysiwyg @class([ccn($baseClass), $class]) :wysiwyg="$content['description']" /> --}}

						<x-text @class([ccn($baseClass, 'description'), 'wysiwyg']) as="span" textStyle="bodyLarge" :isHTML="true">
							{!! $content['description'] !!}
						</x-text>
					@endif
				</div>

				@if ($showCta)
					<x-cta-container @class([ccn($baseClass, 'cta-container')])>
						<x-cta @class([ccn($baseClass, 'cta'), ccn($baseClass, 'cta--desktop')]) priority="primary" :cta="$content['primary_cta']" />
					</x-cta-container>
				@endif
			</div>
		</div>

		@if ($content['usps'])
			<div @class([ccn($baseClass, 'usps')])>
				@foreach ($content['usps'] as $usp)
					<x-usp :usp="$usp" />
					@if (!$loop->last)
						<hr @class([ccn($baseClass, 'divider')])>
					@endif
				@endforeach
			</div>
		@endif
		@if ($showCta && $content['primary_cta'])
			<x-cta @class([ccn($baseClass, 'cta'), ccn($baseClass, 'cta--mobile')]) priority="primary" :cta="$content['primary_cta']" />
		@endif
	</x-container>
</x-section>
