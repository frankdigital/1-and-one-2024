export function initContentTiles(node: HTMLElement) {
	const $contentTilesContainer = $(node);

	if ($contentTilesContainer.length) {
		$($contentTilesContainer).hover(
			function () {
				$(this)
					.find('.jw-wysiwyg.jw-content-tiles__description')
					.removeClass('jw-content-tiles__description')
					.addClass('jw-content-tiles__description--active');
				$(this)
					.find('.jw-content-tiles__image-container')
					.removeClass('jw-content-tiles__image-container')
					.addClass('jw-content-tiles__image-container--active');
			},
			function () {
				$(this)
					.find('.jw-wysiwyg.jw-content-tiles__description--active')
					.removeClass('jw-content-tiles__description--active')
					.addClass('jw-content-tiles__description');
				$(this)
					.find('.jw-content-tiles__image-container--active')
					.removeClass('jw-content-tiles__image-container--active')
					.addClass('jw-content-tiles__image-container');
			},
		);

		$('.jw-content-tiles__read-more').on('click', function () {
			$(this)
				.closest('.jw-content-tiles__tile')
				.find('.jw-wysiwyg.jw-content-tiles__description')
				.removeClass('jw-content-tiles__description')
				.addClass('jw-content-tiles__description--active');
			$(this)
				.closest('.jw-content-tiles__tile')
				.find('.jw-content-tiles__image-container')
				.removeClass('jw-content-tiles__image-container')
				.addClass('jw-content-tiles__image-container--active');
		});
	}
}
