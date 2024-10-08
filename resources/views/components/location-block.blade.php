@php
	$baseClass = 'location-block';
	$telephoneLink = 'tel:' . $telephone['number'];
@endphp

<div @class([ccn($baseClass)])>
	<div @class([ccn($baseClass, 'container')])>
		<x-text as="span" textStyle="body" @class([ccn($baseClass, 'heading')])>
			{!! $title !!}
		</x-text>

		@if (isset($address))
			<x-text textStyle="bodySmall" as="span">
				{!! $address !!}
			</x-text>
		@endif
	</div>
</div>
