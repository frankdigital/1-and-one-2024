@php
	$baseClass = 'team-tile';

@endphp

<div @class([ccn($baseClass)])>
	<div @class([ccn($baseClass, 'image-container')])>
		<x-image :fill="true" :image="$image" :size="[600, 600]" @class([ccn($baseClass, 'image')]) />
	</div>

	<div @class([ccn($baseClass, 'content-container')])>
		<div @class([ccn($baseClass, 'content')])>
			<x-text textStyle="h5" as="h5">
				{!! $name !!}
			</x-text>

			<x-text textStyle="body">
				{!! $position !!}
			</x-text>
		</div>

		<x-cta-container>
			@if ($type === 'modal')
				<button data-modal-trigger="{{ $modalId }}" data-disable-hash @class([ccn($baseClass, 'cta', 'jw-cta')])>
					<x-cta-text-link size="default" label="View Bio" />
				</button>
			@elseif ($type === 'permalink' && isset($url))
				<a href="{{ $url }}" @class([ccn($baseClass, 'cta', 'jw-cta')])>
					<x-cta-text-link size="default" label="View Bio" />
				</a>
			@endif
		</x-cta-container>
	</div>
</div>

<x-base-modal :id="$modalId" type="team">
	<x-team-modal :post="$post" />
</x-base-modal>
