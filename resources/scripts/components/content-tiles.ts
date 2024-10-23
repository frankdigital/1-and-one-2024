import { CONTENT_TILE } from '../selectors';
const windowSizeHandler = $.fn.useWindowSize();

export function initContentTiles(node: HTMLElement) {
	console.log('Content Tiles initialized', node);

	$(node).on('click', function () {
		const parent = $(this).closest(CONTENT_TILE);
		const isActive = parent.hasClass('is-active');

		if (isActive) {
			parent.removeClass('is-active');
		} else {
			parent.addClass('is-active');
		}
	});

	$(window).on('windowSizeChange', () => {
		const isLg = windowSizeHandler.isAtLeast('lg');

		if (isLg) {
			$(CONTENT_TILE).removeClass('is-active');
		}
	});
}
