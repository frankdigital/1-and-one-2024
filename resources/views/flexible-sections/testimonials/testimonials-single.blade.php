@php
	$baseClass = 'testimonials-single';
@endphp

<x-section :contain="false" :scrollId="$section['scroll_id']" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<x-section-wrap :content="$content">
			<div @class([ccn($baseClass, 'carousel')]) data-testimonials-single>
				<div @class([ccn($baseClass, 'tiles')])>
					@isset($content['testimonials'])
						@foreach ($content['testimonials'] as $testimonial)
							<x-testimonial-tile @class([ccn($baseClass, 'tile')]) :data="$testimonial" />
						@endforeach
					@endisset
				</div>
				<nav @class([ccn($baseClass, 'controls')])>
					<div @class([ccn($baseClass, 'arrows')])>
						<x-carousel.arrow direction="prev" />
						<x-carousel.arrow direction="next" />
					</div>
					<x-carousel.progress />
				</nav>
			</div>
		</x-section-wrap>
	</x-container>
</x-section>
