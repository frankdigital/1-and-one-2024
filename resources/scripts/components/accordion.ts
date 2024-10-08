export function initAccordions(node: HTMLElement) {
	const $accordionsContainerTarget = $(node);

	if ($accordionsContainerTarget.length) {
		$accordionsContainerTarget.find('.jw-accordion__trigger').each(function () {
			let id = $(this).attr('id');
			$(this).on('click', function () {
				let expanded = $(this).attr('aria-expanded');
				if (expanded === 'false') {
					$(this)
						.attr('aria-expanded', 'true')
						.closest('.jw-accordion__item')
						.addClass('jw-accordion__item--expanded');

					$('.jw-accordion__content[aria-labelledby="' + id + '"]')
						.removeAttr('hidden')
						.slideDown('fast');

					//closing other accordion
					$(this).closest('.jw-accordion__item').siblings().removeClass('jw-accordion__item--expanded');
					$(this)
						.closest('.jw-accordion__item')
						.siblings()
						.find('.jw-accordion__trigger')
						.attr('aria-expanded', 'false');
					$(this)
						.closest('.jw-accordion__item')
						.siblings()
						.find('.jw-accordion__content')
						.slideUp('fast')
						.attr('hidden', '');

					//end closing ther accordion
				} else {
					$(this)
						.attr('aria-expanded', 'false')
						.closest('.jw-accordion__item')
						.removeClass('jw-accordion__item--expanded');
					$('.jw-accordion__content[aria-labelledby="' + id + '"]')
						.slideUp('fast')
						.attr('hidden', '');
				}
			});
		});
	}
}
