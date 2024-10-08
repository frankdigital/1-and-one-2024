@if ($label && $content)
	<div @class([ccn($baseClass, 'item')]) id="{{ $blockId }}">
		<button aria-expanded="false" @class([ccn($baseClass, 'trigger')]) id="accordion--{{ $blockId }}">
			<x-text as="span" textStyle="bodyLarge" strong @class([ccn($baseClass, 'trigger-text')])>
				{!! $label !!}
			</x-text>
			<div @class([ccn($baseClass, 'icon-container')])>
				<span @class([ccn($baseClass, 'icon-vertical')])></span>

				<span @class([ccn($baseClass, 'icon-horizontal')])></span>
			</div>
		</button>

		<div hidden @class([ccn($baseClass, 'content')]) aria-labelledby="accordion--{{ $blockId }}">
			<x-wysiwyg @class([ccn($baseClass, 'answer')]) :wysiwyg="$content" />
		</div>
	</div>
@endif
