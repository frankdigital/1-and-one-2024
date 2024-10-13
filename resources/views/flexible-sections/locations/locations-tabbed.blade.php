@php
	$baseClass = 'locations-tabbed';
@endphp
<x-section :darkerBg="$darkerBg" :contain="false" @class([ccn($baseClass)])>
	<x-container @class([ccn($baseClass, 'container')])>
		<x-section-wrap :content="$content" :wrap-cta-on-mobile='false'>
			@isset($locations)
				<div @class([ccn($baseClass, 'locations')]) data-tabs-list>
					<x-tabs-list :tabs="wp_list_pluck($locations, 'post_title')" label="Locations tabs" />
					@foreach ($locations as $location)
						<x-location-tab :id="$location->ID" />
					@endforeach
				</div>
			@endisset
		</x-section-wrap>
	</x-container>
</x-section>
