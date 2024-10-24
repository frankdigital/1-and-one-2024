import { CONTENT_TILE, CONTENT_TILE_DESCRIPTION, CONTENT_TILE_TRIGGER } from '../selectors';
import '../helpers/useWindowSize';
const windowSizeHandler = $.fn.useWindowSize();

export function initContentTiles(node: HTMLElement) {
	// console.log('Content Tiles initialized', node);
	let $textContent = $(node).find(CONTENT_TILE_DESCRIPTION).text();
	// console.log($(node).find(CONTENT_TILE_HEADING));
	// const $originalDescription = $textContent;
	const $ctaText = $(node).find(CONTENT_TILE_TRIGGER);
	// const $isSmall = windowSizeHandler.isAtMost('md');
	const isLg = windowSizeHandler.isAtLeast('lg');

	// if ($isSmall && $textContent.length > 93) {
	// 	$textContent = truncateText($textContent, 93);
	// 	$(node).find(CONTENT_TILE_DESCRIPTION).text($textContent);
	// }

	$ctaText.on('click', function (e) {
		e.stopPropagation();
		const parent = $(this).closest(CONTENT_TILE);
		const isActive = parent.hasClass('is-active');
		// const truncatedText = truncateText($originalDescription, 93);
		if (isActive) {
			parent.removeClass('is-active');
			// parent.find(CONTENT_TILE_DESCRIPTION).text(truncatedText);
		} else {
			parent.addClass('is-active');
			// parent.find(CONTENT_TILE_DESCRIPTION).text($originalDescription);
		}
	});

	// $(node)
	// 	.find(CONTENT_TILE_DESCRIPTION)
	// 	.each(function () {
	// 		const $tileDescription = $(this);
	// 		const $textContent = $tileDescription.text();
	// 		const $sibling = $tileDescription.closest(CONTENT_TILE).find('h4');

	// 		if ($textContent.length <= 133) {
	// 			$tileDescription.removeClass('jw-content-tiles__tile-description--unclamped');
	// 			$tileDescription.addClass('jw-content-tiles__tile-description');

	// 			if ($tileDescription.hasClass('jw-content-tiles__tile-description--clamped')) {
	// 				$tileDescription.addClass('hidden');
	// 			}

	// 			$sibling.addClass('jw-content-tiles__tile-heading--single');
	// 			$sibling.removeClass('jw-content-tiles__tile-heading');
	// 			$sibling.each(function () {
	// 				const $currentSibling = $(this);
	// 				if ($currentSibling.hasClass('jw-content-tiles__tile-heading--hovered')) {
	// 					$currentSibling.addClass('hidden');
	// 				}
	// 			});
	// 		}
	// 	});

	$(window).on('windowSizeChange', () => {
		if (isLg) {
			$(CONTENT_TILE).removeClass('is-active');

			// $(node).on('mouseenter', function () {
			// 	$(this).find(CONTENT_TILE_DESCRIPTION).text($originalDescription);
			// 	$(this).find(CONTENT_TILE_DESCRIPTION).addClass('jw-content-tiles__tile-description--unclamped');
			// 	$(this).find(CONTENT_TILE_DESCRIPTION).removeClass('jw-content-tiles__tile-description--clamped');
			// });

			// $(node).on('mouseleave', function () {
			// 	if ($originalDescription.length > 127) {
			// 		const truncatedText = truncateText($originalDescription, 133);
			// 		$(this).find(CONTENT_TILE_DESCRIPTION).text(truncatedText);
			// 		$(this).find(CONTENT_TILE_DESCRIPTION).addClass('jw-content-tiles__tile-description--truncated');
			// 		$(this)
			// 			.find(CONTENT_TILE_DESCRIPTION)
			// 			.removeClass('jw-content-tiles__tile-description--full-length');
			// 	}
			// });
		}
	});
}

// function truncateText(text: string, maxLength: number): string {
// 	if (text.length > maxLength) {
// 		return text.substring(0, maxLength) + '...';
// 	}
// 	return text;
// }
