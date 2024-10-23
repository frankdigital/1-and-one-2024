export function initContentTiles(node: HTMLElement) {
	console.log('Content Tiles initialized', node);

	$('.jw-content-tiles__tile-cta--active').on('click', function () {
		const $tile = $(this).closest('.jw-content-tiles__tile');
		const currentPointerEvents = $tile.css('pointer-events');

		if (currentPointerEvents === 'none') {
			$tile.css({ 'pointer-events': 'hover' });
			console.log('Pointer events enabled');
		} else {
			$tile.css({ 'pointer-events': 'none' });
			console.log('Pointer events disabled');
		}
	});
}
