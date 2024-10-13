@php
	$baseClass = 'location-tab';
	$telephoneLink = 'tel:' . $telephone['number'];
	$emailLink = 'mailto:' . $email;
@endphp
<div @class([ccn($baseClass)]) tabindex="0" role="tabpanel" id='tabpanel-{{ sanitize_title($title) }}'>
	@if ($image)
		<div @class([ccn($baseClass, 'image-container')])>
			<x-image :image="$image" :crop='true' :rounded='true' :fill="true" :size="[1196, 1000]"
				@class([ccn($baseClass, 'image')]) />
		</div>
	@endif
	<div @class([ccn($baseClass, 'content-container')])>
		<div @class([ccn($baseClass, 'content')])>
			@if ($heading)
				<x-text as="h5">
					{!! $heading !!}
				</x-text>
			@endif
			@if ($description)
				<x-text :isHTML="true" @class([ccn($baseClass, 'description')])>
					{!! $description !!}
				</x-text>
			@endif
		</div>
		@if ($email || $telephone)
			<hr @class([ccn($baseClass, 'divider')])>
			<div @class([ccn($baseClass, 'contact-row')])>
				@if ($email && $emailLink)
					<div @class([ccn($baseClass, 'contact-details')])>
						<x-text @class([ccn($baseClass, 'contact-heading')])>Email</x-text>
						<x-default-link @class([ccn($baseClass, 'contact-link')]) :url="$emailLink" :title="$email" target="_self" />
					</div>
				@endif
				@if ($telephone['formatted_number'] && $telephone['number'] && $telephoneLink)
					<div @class([ccn($baseClass, 'contact-details')])>
						<x-text @class([ccn($baseClass, 'contact-heading')])>Phone</x-text>
						<x-default-link @class([ccn($baseClass, 'contact-link')]) :url="$telephoneLink" :title="$telephone['formatted_number']" target="_self" />
					</div>
				@endif
			</div>
		@endif
		@if ($address || $hours)
			<hr @class([ccn($baseClass, 'divider')])>
			<div @class([ccn($baseClass, 'contact-row')])>
				@if ($address)
					<div @class([ccn($baseClass, 'contact-details')])>
						<x-text @class([ccn($baseClass, 'contact-heading')])>Address</x-text>
						<x-text :isHTML="true" @class([ccn($baseClass, 'contact-content')])>
							{!! $address !!}
						</x-text>
						@if ($directionsCta)
							<x-cta priority="text-link" size='small' :cta="$directionsCta" icon="Open" />
						@endif
					</div>
				@endif
				@if ($hours)
					<div @class([ccn($baseClass, 'contact-details')])>
						<x-text @class([ccn($baseClass, 'contact-heading')])>Office Hours</x-text>
						<x-text :isHTML="true" @class([ccn($baseClass, 'contact-content')])>
							{!! $hours !!}
						</x-text>
					</div>
				@endif
			</div>
		@endif
	</div>
</div>
