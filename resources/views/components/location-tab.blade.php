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
			@if (isset($heading) && !empty($heading))
				<x-text as="h4" @class([ccn($baseClass, 'heading')])>
					{!! $heading !!}
				</x-text>
			@endif
			@if (isset($description) && !empty($description))
				<x-text :isHTML="true" @class([ccn($baseClass, 'description')])>
					{!! $description !!}
				</x-text>
			@endif
		</div>
		@if ($email || $address)
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
				@if (isset($emailLink) && !empty($emailLink))
					<div @class([ccn($baseClass, 'contact-details')])>
						<x-text @class([ccn($baseClass, 'contact-heading')])>Email</x-text>
						<x-default-link @class([ccn($baseClass, 'contact-link')]) :url="$emailLink" title="Contact via email" target="_self" />
					</div>
				@endif
			</div>
		@endif
	</div>
</div>
