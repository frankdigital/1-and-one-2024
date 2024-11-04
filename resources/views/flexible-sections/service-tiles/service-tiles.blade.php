@php
	$baseClass = 'service-tiles';
@endphp

<x-section :darkerBg="$darkerBg" :contain="false" :scrollId="$section['scroll_id']" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<x-section-wrap :content="$content" priority="secondary">
			<div @class([ccn($baseClass, 'carousel')]) data-service-tiles>
				<div @class([ccn($baseClass, 'tiles')])>
					@isset($content['pages'])
						@foreach ($content['pages'] as $service)
							<x-service-tile @class([ccn($baseClass, 'tile')]) :id="$service" />
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
