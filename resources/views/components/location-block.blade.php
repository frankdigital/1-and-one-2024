@php
	$baseClass = 'location-block';
	$telephoneLink = 'tel:' . $telephone['number'];
@endphp

<div @class([ccn($baseClass)])>
	<div @class([ccn($baseClass, 'container')])>
		<div @class([ccn($baseClass, 'label')])>
			@if (isset($headOffice) && $headOffice)
				<x-text as="eyebrow">
					Head Office
				</x-text>
			@endif
		</div>

		<x-text as="h5" @class([ccn($baseClass, 'heading')])>
			{!! $title !!}
		</x-text>

		@if (isset($address))
			<x-text textStyle="bodySmall" as="span" @class([ccn($baseClass, 'address')])>
				{!! $address !!}
			</x-text>
		@endif
	</div>
</div>
