export function initCtaBlockContained(node: HTMLElement | Document | JQuery.PlainObject | undefined): void {
	if (!node) return;

	// Convert node to a jQuery object to ensure compatibility with jQuery methods
	const $element = $(node as HTMLElement);

	// Find the previous sibling section element directly before $element
	const $section = $element.prev('section');

	// Check if the previous section has the exact class 'jw-section--darker'
	const hasDarkerClass = $section.hasClass('jw-section--darker');

	if (hasDarkerClass) {
		$element.addClass('jw-section--darker');
		$element.removeClass('jw-section--lighter');
	}
}
