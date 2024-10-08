<span class="{{ $getCtaStyles() }}">
	@if ($label)
		<span class="{{ $getLabelStyles() }}">
			{!! $label !!}
		</span>
	@endif

	<span class="{{ $getIconStyles() }}">
		<x-icon-handler :icon="$icon" />
	</span>
</span>
