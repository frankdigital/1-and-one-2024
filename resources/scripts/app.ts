import domReady from '@roots/sage/client/dom-ready';
import Choices from 'choices.js';

import { SmoothScroller } from './core/SmoothScroller';
import { initAnimation } from './core/animation';

import { initSlider } from './components/carousel';
import {
	ACCORDION_CONTAINER,
	ANIMATE_HEIGHT,
	BLOG_LISTING,
	CONTENT_TILE,
	CONTENT_TILE_TRIGGER,
	CONTENT_TILE_DESCRIPTION,
	INHERIT_COLOR_SELECTOR,
	LOGOS_CAROUSEL,
	SERVICE_TILES,
	TABS_LIST,
	TESTIMONIALS_DUAL,
	TESTIMONIALS_SINGLE,
	GRAVITY_FORM_CONFIRMATION_ACTIONS,
	OBFUSCATE_SELECTOR,
	HEADER_MEGAMENU_TARGET,
} from './selectors';
import { initModal } from './ui/base-modal';
import { registerAppHeight } from './core/appHeight';
import AutoScroll from 'embla-carousel-auto-scroll';
import { registerHeaderHeight } from './core/headerHeight';
import { initBlogListing } from './components/blogListing';
import { initTabs } from './components/tabs';
import { initAccordions } from './components/accordion';
import { initAnimateHeight } from './core/animateHeight';
import { initCtaBlockContained } from './components/ctaBlock/initCtaBlockContained';
import { initContentTiles } from './components/content-tiles';
import { initMegamenu } from './navigation/initMegamenu';
import { initJaywingConsoleLog } from './components/jaywingConsoleLog';

/**
 * Application entrypoint
 */
domReady(async () => {
	const scroller = new SmoothScroller();
	scroller.start();

	registerAppHeight();
	registerHeaderHeight();

	initAnimation();
	initModal(scroller);
	initMegamenu(scroller);

	// const animateHeight = document.querySelectorAll(ANIMATE_HEIGHT);
	// if (animateHeight) {
	// 	animateHeight.forEach((element) => {
	// 		initAnimateHeight(element as HTMLElement);
	// 	});
	// }

	const selectElements = document.querySelectorAll('.gfield_select');
	if (selectElements) {
		selectElements.forEach((element) => {
			new Choices(element, {
				itemSelectText: '',
				searchEnabled: false,
				shouldSort: false,
			});
		});
	}

	const serviceTiles = document.querySelectorAll(SERVICE_TILES);
	if (serviceTiles) {
		serviceTiles.forEach((element) => {
			initSlider(element as HTMLElement, { align: 'start' });
		});
	}

	const logosCarousel = document.querySelectorAll(LOGOS_CAROUSEL);
	if (logosCarousel) {
		logosCarousel.forEach((element) => {
			initSlider(element as HTMLElement, { loop: true }, [AutoScroll({ stopOnInteraction: false, speed: 1 })]);
		});
	}

	const testimonialsSingle = document.querySelectorAll(TESTIMONIALS_SINGLE);
	if (testimonialsSingle) {
		testimonialsSingle.forEach((element) => {
			initSlider(element as HTMLElement, { align: 'start' });
		});
	}

	const testimonialsDual = document.querySelectorAll(TESTIMONIALS_DUAL);
	if (testimonialsDual) {
		testimonialsDual.forEach((element) => {
			initSlider(element as HTMLElement, { align: 'start' });
		});
	}

	const blogListing = document.querySelectorAll(BLOG_LISTING);
	if (blogListing) {
		blogListing.forEach((blogListing) => {
			initBlogListing(blogListing as HTMLElement);
		});
	}

	const tabsList = document.querySelectorAll(TABS_LIST);
	if (tabsList) {
		tabsList.forEach((element) => {
			initTabs(element as HTMLElement);
		});
	}

	const accordion = document.querySelectorAll(ACCORDION_CONTAINER);
	if (accordion) {
		accordion.forEach((element) => {
			initAccordions(element as HTMLElement);
		});
	}

	const contentTile = document.querySelectorAll(CONTENT_TILE);
	if (contentTile) {
		contentTile.forEach((element) => {
			initContentTiles(element as HTMLElement);
		});
	}

	const contentTileTrigger = document.querySelectorAll(CONTENT_TILE_TRIGGER);
	if (contentTileTrigger) {
		contentTileTrigger.forEach((element) => {
			initContentTiles(element as HTMLElement);
		});
	}

	const contentTileDescription = document.querySelectorAll(CONTENT_TILE_DESCRIPTION);
	if (contentTileDescription) {
		contentTileDescription.forEach((element) => {
			initContentTiles(element as HTMLElement);
		});
	}

	const ctaBlockConbtained = document.querySelectorAll(INHERIT_COLOR_SELECTOR);
	if (ctaBlockConbtained) {
		ctaBlockConbtained.forEach((element) => {
			initCtaBlockContained(element as HTMLElement);
		});
	}

	jQuery(document).on('gform_confirmation_loaded', function (_, formId) {
		const target = $(`#gf_${formId}`).parent();
		const $actions = target.find(GRAVITY_FORM_CONFIRMATION_ACTIONS);

		if ($actions) {
			$actions.addClass('is-active');
		}
	});

	const obfuscateString = document.querySelectorAll(OBFUSCATE_SELECTOR);

	if (obfuscateString) {
		obfuscateString.forEach((element) => {
			const $target = $(element);
			const obfuscateType = $target.data('obfuscate');

			if (obfuscateType === 'email') {
				const mailtoLink = $target.attr('href');
				if (mailtoLink && mailtoLink.startsWith('mailto:')) {
					const email = mailtoLink.slice(7).split('').reverse().join('');
					$target.attr('href', `mailto:${email}`);
				}
			}

			if (obfuscateType === 'tel') {
				const telLink = $target.attr('href');
				if (telLink && telLink.startsWith('tel:')) {
					const tel = telLink.slice(4).split('').reverse().join('');
					$target.attr('href', `tel:${tel}`);
				}
			}
		});
	}

	$('.gfield--input-type-consent.gfield_contains_required').each(function () {
		const label = $(this).find('label');
		// Weird issue, where some forms show the (Required) when needed by default, others don't. Solution is to remove them all and add them back in.
		const text = label.text().replace('(Required)', '');
		label.text(`${text} (Required)`);
	});

	const repositionNavigation = () => {
		const logo = document.querySelector<HTMLElement>('#logo-reference');
		const navigation = document.querySelector<HTMLElement>('.jw-responsive-menu');
		const megamenu = document.querySelector<HTMLElement>('.jw-megamenu-callout__menu-container');

		// Exit early if any element is missing
		if (!logo || !navigation || !megamenu) return;

		// Check screen width condition
		if (window.innerWidth > 1736) {
			const logoRect = logo.getBoundingClientRect();
			const megamenuRect = megamenu.getBoundingClientRect();

			// Calculate offset
			const totalOffset = megamenuRect.left - logoRect.left;

			// Set width dynamically
			logo.style.width = `${totalOffset}px`;
		} else {
			// Reset width to default
			logo.style.width = 'auto';
		}
	};

	// Debounce utility to improve performance
	const debounce = (func: () => void, wait: number) => {
		let timeout: ReturnType<typeof setTimeout>;
		return (...args: any[]) => {
			clearTimeout(timeout);
			timeout = setTimeout(() => func.apply(null, args), wait);
		};
	};

	// Attach the debounced event listener
	window.addEventListener('resize', debounce(repositionNavigation, 200));

	// Initial call to position navigation on page load
	repositionNavigation();

	repositionNavigation();

	initJaywingConsoleLog();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
// @ts-ignore
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
