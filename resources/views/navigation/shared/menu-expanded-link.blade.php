@php
	$baseClass = 'menu-expanded-link';
@endphp

<a href="{{ $href }}" @class([ccn($baseClass)])>
	@if (isset($icon))
		<div @class([ccn($baseClass, 'icon-container')])>
			<x-contained-icon size="small" :icon="$icon" @class([ccn($baseClass, 'icon')]) />
		</div>
	@endif

	<div @class([ccn($baseClass, 'content-container')])>
		<div @class([ccn($baseClass, 'content')])>
			<x-text as="span" :strong="true" textStyle="bodySmall" @class([ccn($baseClass, 'label')])>
				{!! $label !!}
			</x-text>

			@if (isset($excerpt))
				<x-text as="span" textStyle="caption" @class([ccn($baseClass, 'excerpt')])>
					{!! $excerpt !!}
				</x-text>
			@endif
		</div>
	</div>
</a>
