@if ($shouldDisplay())
	@php
		$tag = $type === 'link' ? 'a' : 'button';
	@endphp

	@if ($type === 'link')
		<a {{ $attributes->merge(['href' => $url, 'class' => $linkClasses(), 'target' => $target]) }}>
			@if (!$isTextLink)
				<x-cta-button-contained :priority="$priority" :size="$size" :label="$label" :icon="$icon" />
			@else
				<x-cta-text-link :size="$size" :label="$label" :icon="$icon" />
			@endif
		</a>
	@elseif ($type === 'button')
		<button {{ $attributes->merge(array_merge($attributeData, ['class' => $linkClasses()])) }}>
			@if (!$isTextLink)
				<x-cta-button-contained :priority="$priority" :size="$size" :label="$label" :icon="$icon" />
			@else
				<x-cta-text-link :size="$size" :label="$label" :icon="$icon" />
			@endif
		</button>

		@if (isset($modalType) && $modalType === 'team')
			<x-base-modal :id="$modalId" type="team">
				<x-team-modal :post="$modalData" />
			</x-base-modal>
		@endif
	@endif
@endif
