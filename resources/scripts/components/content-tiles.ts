import { CONTENT_TILE, CONTENT_TILE_CONTENT, CONTENT_TILE_DESCRIPTION, CONTENT_TILE_TRIGGER } from '../selectors';
import '../helpers/useWindowSize';
const windowSizeHandler = $.fn.useWindowSize();

export function initContentTiles(node: HTMLElement) {
	const $ctaText = $(node).find(CONTENT_TILE_TRIGGER);

	const textContainer = $(node).closest(CONTENT_TILE_DESCRIPTION);
	const contentContainer = $(node).closest(CONTENT_TILE_CONTENT);
	const maxHeight = 80;

	$ctaText.on('click', function (e) {
		e.stopPropagation();

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

			const height = textContainer.outerHeight();
			let translateValue = 0;
			if (height !== undefined && height > maxHeight) {
				translateValue = height - maxHeight;
				contentContainer.css('transform', `translateY(${translateValue}px)`);
			} else {
				const parent = textContainer.closest(CONTENT_TILE);
				parent.addClass('no-gradient');
			}
		} else {
			contentContainer.css('transform', `translateY(0)`);
		}
	});
}
