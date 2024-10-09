<span class="{{ $getCtaStyles() }}">
	@if ($label)
		<span class="{{ $getLabelStyles() }}">
			{!! $label !!}
		</span>
	@endif

	@if ($icon)
		<span class="{{ $getIconStyles() }}">
			<x-icon-handler :icon="$icon" />
		</span>
	@endif
</span>
