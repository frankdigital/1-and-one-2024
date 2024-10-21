import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initBlogListing(node: HTMLElement | Document | JQuery.PlainObject<any> | undefined) {
	gsap.registerPlugin(ScrollTrigger);

	const $paginationTriggers = $('[data-blog-listing-pagination-trigger]', node);
	const $paginationTargets = $('[data-blog-listing-pagination-target]', node);
	const $nextButton = $('[data-blog-listing-pagination-next]', node);

	let currentIndex = 0;
	const maxIndex = $paginationTriggers.length - 1;

	const showGridGroup = (index: number) => {
		// Hide all grid groups and remove active class from buttons
		$paginationTargets.addClass('is-hidden');
		$paginationTriggers.removeClass('jw-blog-listing-standard__pagination-button--active');

		// Show the selected grid group and add active class to button
		const $target = $(`[data-blog-listing-pagination-target="${index}"]`, node).removeClass('is-hidden');
		$(`[data-blog-listing-pagination-trigger="${index}"]`, node).addClass(
			'jw-blog-listing-standard__pagination-button--active',
		);

		// Animate the card blogs within the target
		const $cardBlogs = $target.find('[data-transition-target]');
		setTimeout(() => {
			gsap.from($cardBlogs, {
				autoAlpha: 0,
				y: 50,
				scale: 0.95,
				stagger: 0.2,
				duration: 0.5,
				ease: 'power2.out',
			});
		}, 100);

		$nextButton.toggleClass('disabled', index >= maxIndex).css('opacity', index >= maxIndex ? 0.5 : 1);
	};

	// Scroll to section top with offset
	const scrollToSection = () => {
		const $sectionNode = $(node).closest('section');
		if ($sectionNode.length) {
			const headerHeight = parseFloat($('body').css('--header-height')) || 0;
			const sectionOffset = $sectionNode.offset();
			const sectionTop = sectionOffset ? sectionOffset.top - headerHeight - 32 : 0;

			$('html, body').animate({ scrollTop: sectionTop }, 500); // Use jQuery's animate for smooth scroll
		}
	};

	$paginationTriggers.on('click', function () {
		currentIndex = $paginationTriggers.index(this);
		scrollToSection();
		showGridGroup(currentIndex);
	});

	$nextButton.on('click', function () {
		if (currentIndex < maxIndex) {
			currentIndex++;
			scrollToSection();
			showGridGroup(currentIndex);
		}
	});

	showGridGroup(0);
}
